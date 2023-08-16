<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Layouts;
use App\Http\Controllers\Controller;
use App\Models\waGroup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class WAProgrammerController extends Controller
{
    public function index(){
        return Layouts::view('admin.wagroup.index');
    }

    public function json(Request $request){
        if(!$request->ajax()) return redirect()->route('admin.wagroup.index');
        $table = waGroup::all();
        return datatables()->of($table)
            ->addColumn('whatsapp', function($row){
                return '<div class="d-flex justify-content-start align-items-center user-name"><div class="avatar-wrapper"><div class="avatar me-2"><img src="'.$row->_image().'" alt="Avatar" class="rounded-circle"></div></div><div class="d-flex flex-column"><a href="'.$row->whatsapp_url.'" class="emp_name text-truncate">'.htmlspecialchars($row->name).'</a><small class="emp_post text-truncate text-muted"></small></div></div>';
            })
            ->editColumn('status', function($row){
                $s = [];
                if($row->status == 'published'){
                    $s = [
                        'class' => 'info',
                        'text' => 'Published'
                    ];
                } else if ($row->status == 'pending') {
                    $s = [
                        'class' => 'warning',
                        'text' => 'Pending'
                    ];
                } else {
                    $s = [
                        'class' => 'secondary',
                        'text' => 'Draft'
                    ];
                }

                return '<div class="btn-group">
                <span type="button" class="badge bg-label-'.$s['class'].' dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                    '.$s['text'].'
                </span>
                <ul class="dropdown-menu" style="">
                  <li><a data-id="'.$row->id.'" data-status="published" class="dropdown-item __btn_switch_status" href="javascript:void(0);">Published</a></li>
                  <li><a data-id="'.$row->id.'" data-status="pending" class="dropdown-item __btn_switch_status" href="javascript:void(0);">Pending</a></li>
                  <li><a data-id="'.$row->id.'" data-status="draft" class="dropdown-item __btn_switch_status" href="javascript:void(0);">Draft</a></li>
                </ul>
              </div>';
            })
            ->rawColumns(['whatsapp','status'])
            ->make(true);
    }

    public function toggle_status(Request $request){
        if(!$request->ajax()) return redirect()->route('admin.wagroup.index');
        $request->validate([
            'id' => 'required|integer',
            'status' => 'required|string|in:published,pending,draft'
        ]);

        $table = waGroup::find($request->id);
        $table->status = $request->status;
        $table->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Status updated successfully'
        ]);
    }

    public function destroy(Request $request){
        if(!$request->ajax()) return redirect()->route('admin.wagroup.index');
        $request->validate([
            'ids' => 'required|array',
        ]);
        $ids = $request->ids;
        $table = waGroup::whereIn('id', $ids);
        foreach($table->get() as $row){
            if($row->image){ Storage::delete($row->image); }
        }
        $table->delete();
        return response()->json([
            'status' => 'success',
            'message' => 'Group deleted successfully'
        ]);
    }

}
