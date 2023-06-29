<?php

namespace App\Http\Controllers;

use App\Helpers\Layouts;
use App\Models\License;
use App\Models\OwnedLicense;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class DashboardsController extends Controller
{
    public function index(){
        return Layouts::view('dash.index');
    }

    // profile settings --------------------------------------------------

    public function personal(Request $request){
        if($request->isMethod('post') && $request->ajax()){
            if (RateLimiter::tooManyAttempts('personal-update:'.auth()->id(), 5)) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Too many attempts, please try again later'
                ], 429);
            }
            $request->validate([
                'name' => 'required|string|max:50',
                'email' => 'required|email|unique:users,email,'.auth()->id(),
                'username' => 'required|string|max:255|unique:users,username,'.auth()->id(),
                'whatsapp' => 'max:30|unique:users,whatsapp,'.auth()->id().'|nullable',
                'about' => 'max:255|nullable',
            ]);

            $user = auth()->user();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->username = $request->username;
            $user->whatsapp = $request->whatsapp;
            $user->about = $request->about;
            $user->save();
            RateLimiter::hit('personal-update:'.auth()->id());

            return response()->json([
                'status' => 'success',
                'message' => 'Profile updated successfully'
            ]);
        } else {
            $data['seo'] = (object)[
                'title' => 'Personal Dashboard',
            ];
            return Layouts::view('dash.personal',$data);
        }
    }

    public function personal_toggle_private() {
        if (RateLimiter::tooManyAttempts('personal-toggle-private:'.auth()->id(), 5)) {
            return response()->json([
                'status' => 'error',
                'message' => 'You are too fast, slow down'
            ], 429);
        }
        RateLimiter::hit('personal-toggle-private:'.auth()->id());
        $user = auth()->user();
        $user->private = $user->private == 'yes' ? 'no' : 'yes';
        $user->save();
        $status = $user->private == 'yes' ? 'private' : 'public';
        return response()->json([
            'message' => 'Profile privacy updated to <span class="text-violet-500">'. $status .'</span>',
            'title' => $status
        ]);
    }

    public function security(Request $request){
        if($request->isMethod('post') && $request->ajax()){
            if (RateLimiter::tooManyAttempts('security-update:'.auth()->id(), 3)) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'You are too fast, slow down'
                ], 429);
            }
            $request->validate([
                'current_password' => 'required|string',
                'new_password' => 'required|string|min:8',
                'confirm_password' => 'required|string|min:8|same:new_password',
            ]);
            $user = auth()->user();
            if(password_verify($request->current_password, $user->password)){
                $user->password = bcrypt($request->new_password);
                $user->save();
                RateLimiter::hit('security-update:'.auth()->id());
                return response()->json([
                    'status' => 'success',
                    'message' => 'Password updated successfully'
                ]);
            } else {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Current password is incorrect'
                ], 422);
            }
        } else {
            $data['seo'] = (object)[
                'title' => 'Security Dashboard',
            ];
            return Layouts::view('dash.security',$data);
        }
    }

    public function update_avatar(Request $request){
        if (RateLimiter::tooManyAttempts('avatar-update:'.auth()->id(), 2)) {
            return response()->json([
                'status' => 'error',
                'message' => 'Too many attempts, please try again later'
            ], 429);
        }
        $request->validate([
            'avatar' => 'required|image|mimes:jpeg,png,jpg,svg|max:3048',
        ]);

        try{
            $auth = auth()->user();
            $image = $request->file('avatar');
            $input['imagename'] = $auth->username."-".time().'.'.$image->extension();
            $imgFile = Image::make($image->getRealPath());
            $imgFile->fit(300, 300);
            $imgFile->encode('jpg', 80);
            Storage::put('avatars/'.$input['imagename'], $imgFile);
            if(Storage::exists('avatars/'.$auth->avatar)){
                Storage::delete('avatars/'.$auth->avatar);
            }
            $auth->avatar = $input['imagename'];
            $auth->save();
            RateLimiter::hit('avatar-update:'.auth()->id());
        } catch (e){
            return response()->json([
                'status' => 'error',
                'message' => 'Something went wrong, please try again later'
            ], 422);
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Avatar updated successfully',
            'avatar' => asset('storage/avatars/'.$input['imagename'])
        ]);

    }

    public function purchases(Request $request){
        $data['seo'] = (object)[
            'title' => 'Purchases',
        ];
        // wher item type is product and user id is auth id
        $data['purchases'] = OwnedLicense::where(['user_id' => auth()->id(), 'item' => 'digital-product'])->orderBy('id','desc');
        return Layouts::view('dash.purchases',$data);
    }

    // axios routes
    public function getdownloadDproduct($id, Request $request){
        if(!$request->ajax()) return abort(404);
        if(!auth()->check()) return response()->json([
            'type' => 'bug',
            'status' => 'error',
            'message' => 'You are not logged in'
        ], 422);
        if (RateLimiter::tooManyAttempts('getdownload-dp:'.auth()->id(), 5)) {
            return response()->json([
                'type' => 'bug',
                'message' => 'Too many attempts, please slow down'
            ], 429);
        }
        if(!$id) return response()->json([
            'type' => 'bug',
            'message' => 'Something went wrong, please try again later'
        ], 422);
        $license = OwnedLicense::where(['user_id' => auth()->id(), 'item' => 'digital-product', 'id' => $id])->first();
        if(!$license) return response()->json([
            'type' => 'bug',
            'message' => 'You do not have access to this file.'
        ], 422);

        RateLimiter::hit('getdownload-dp:'.auth()->id());
        return response()->json([
            'message' => 'success',
            'release' => $license->_item->release
        ]);
    }

    public function wishlist(Request $request){
        $data['seo'] = (object)[
            'title' => 'Wishlist',
        ];
        $data['wishlists'] = Product::whereIn('id',auth()->user()->digital_product_wishlist)->orderBy('id','desc');
        return Layouts::view('dash.wishlist',$data);
    }

    // profile settings --------------------------------------------------

    public function claimLicense($license){
        if(RateLimiter::tooManyAttempts('claim-license:'.auth()->id(), 3)){
            return redirect()->route('dash')->with('bug','You are too fast, slow down');
        }
        RateLimiter::hit('claim-license:'.auth()->id());
        $getl = License::where(['id' => $license])->first();
        if(!$getl) return redirect()->route('dash')->with('bug','License not found.');


        if($getl->item=='digital-product'){
            if(OwnedLicense::where(['user_id' => auth()->id(), 'item' => $getl->item, 'item_id' => $getl->item_id])->first()){
                return redirect()->route('dash.purchases')->with('bug','You already have this license.');
            }

            $owned = new OwnedLicense();
            $owned->user_id = auth()->id();
            $owned->license_key = $getl->license_key;
            $owned->item = $getl->item;
            $owned->item_id = $getl->item_id;
            $owned->expires_at = $getl->expires_at;
            $owned->save();

            $getl->delete();

            return redirect()->route('dash.purchases')->with('success','License claimed successfully for '.$owned->_item->title.'');
        }
    }

    public function reports(){
        $data['seo'] = (object)[
            'title' => 'Reports',
        ];
        return Layouts::view('dash.reports',$data);
    }
}
