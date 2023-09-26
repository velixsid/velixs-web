<?php

namespace App\Http\Controllers;

use App\Helpers\Layouts;
use App\Models\UserTransaction;
use Illuminate\Cache\RateLimiter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashReferralController extends Controller
{
    public function index(Request $request){
        $data['seo'] = (object)[
            'title' => 'Referral',
        ];
        $data['total_payout'] = UserTransaction::where(['user_id'=> auth()->id(), 'type'=> 'earnings'])->sum('amount');
        $data['earnings_month'] = UserTransaction::where(['user_id'=> auth()->id(), 'type'=> 'earnings'])->whereMonth('created_at', date('m'))->sum('amount');
        $data['payments'] = config('referral.payment');
        return Layouts::view('dash.referral',$data);
    }

    public function getTransaction(Request $request){
        if($request->ajax()){
            $type = $request->query('type');
            $table = UserTransaction::where(['type' => $type, 'user_id' => auth()->id()])->orderBy('created_at', 'desc')->paginate(5);
            $table->map(function($row){
                if($row->type=='withdraw'){
                    $row->amount = "- ". number_format($row->amount, 2, '.', ',');
                }else if($row->type=='earnings'){
                    $row->amount = "+ ". number_format($row->amount, 2, '.', ',');
                }
                $row->created = $row->created_at->format('d, M Y');
            });
            return response()->json($table);
        }
    }

    public function withdraw(Request $request){
        if(!$request->ajax()) return abort(404);
        $request->validate([
            'method_payment' => 'required',
            'payment' => 'required',
            'amount' => 'required',
        ],[
            'method_payment.required' => 'Please select payment method',
            'payment.required' => 'Please enter your information to withdraw.',
            'amount.required' => 'Please enter amount to withdraw.',
        ]);

        $payment = null;
        foreach(config('referral.payment') as $py){
            if($py['name'] === $request->method_payment){
                $payment = $py;
                break;
            }
        }
        if(!$payment) return response()->json(['style'=>'error', 'message' => 'Payment method not found.'], 404);

        $section = null;
        foreach($payment['section'] as $sc){
            if(floatval($sc['amount']) === floatval($request->amount)){
                $section = $sc;
                break;
            }
        }
        if(!$section) return response()->json(['style'=>'error', 'message' => 'Amount not found.'], 404);
        if(floatval(auth()->user()->saldo) < floatval($request->amount)) return response()->json(['style'=>'info', 'title'=> 'Balance', 'message' => 'Your balance is not enough!.'], 404);

        if(UserTransaction::where([
            'user_id' => auth()->id(),
            'type' => 'withdraw',
            'status' => 'pending',
        ])->exists()) return response()->json(['style'=>'info','title' => 'Pending' , 'message' => 'Wait for the previous transaction to complete.'], 404);

        try{
            DB::beginTransaction();
            UserTransaction::create([
                'user_id' => auth()->id(),
                'type' => 'withdraw',
                'amount' => floatval($section['amount']),
                'method' => $request->method_payment,
                'to' => $request->payment,
                'status' => 'pending',
                'description' => '-',
                'message_status' => 'Sedang diproses',
            ]);

            auth()->user()->saldo -= floatval($request->amount);
            auth()->user()->save();

            DB::commit();
            return response()->json(['style'=>'success', 'message' => 'Withdrawal successfully.'], 200);
        }catch(\Exception $e){
            DB::rollBack();
            return response()->json(['style'=>'error', 'message' => $e->getMessage()], 404);
        }
    }
}
