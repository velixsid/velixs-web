<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Layouts;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UsersController extends Controller
{
    public function index(){
        return Layouts::view('admin.users.index');
    }


    public function json(Request $request){
        if(!$request->ajax()) return redirect()->route('admin.users.index');
        $table = User::all();
        return datatables()->of($table)
            ->addColumn('profile', function($row){
                return '<div class="d-flex justify-content-start align-items-center user-name"><div class="avatar-wrapper"><div class="avatar me-2"><img src="'.$row->_avatar().'" alt="Avatar" class="rounded-circle"></div></div><div class="d-flex flex-column"><a href="'.route('profile',$row->username).'" class="emp_name text-truncate">'.htmlspecialchars($row->name).'</a><small class="emp_post text-truncate text-muted">'.htmlspecialchars($row->username).'</small></div></div>';
            })
            ->editColumn('role',function($row){
                return $row->role == 'admin' ? '<span class="badge bg-label-danger">⚡ Admin</span>' : '<span class="badge bg-label-primary">User</span>';
            })
            ->editColumn('suspended',function($row){
                return $row->suspend ? '<span class="badge bg-label-danger">Suspended</span>' : '<span class="badge bg-label-success">-</span>';
            })
            ->editColumn('created_at',function($row){
                return $row->created_at->diffForHumans();
            })
            ->rawColumns(['profile','role','suspended'])
            ->make(true);
    }


    public function destroy(Request $request){
        if(!$request->ajax()) return redirect()->route('admin.users.index');
        $request->validate([
            'ids' => 'required|array',
        ]);
        $ids = $request->ids;
        User::whereIn('id', $ids)->delete();
        return response()->json([
            'status' => 'success',
            'message' => 'Users deleted successfully.'
        ]);
    }

    public function edit($id){
        $user = User::find($id);
        if(!$user) return redirect()->route('admin.users.index')->with('error','User not found.');
        return Layouts::view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, $id){
        if(!$request->ajax()) return redirect()->route('admin.users.index');
        $user = User::find($id);
        if(!$user) return response()->json([
            'status' => 'error',
            'message' => 'User not found.'
        ], 404);

        $request->validate([
            'name' => 'required|string|max:50',
            'email' => 'required|email|unique:users,email,'.$user->id,
            'username' => 'required|regex:/^[a-z0-9]+$/|max:255|unique:users,username,'.$user->id,
            'whatsapp' => 'max:30|unique:users,whatsapp,'.$user->id.'|nullable',
            'about' => 'max:255|nullable',
        ],[
            'username.regex' => 'Username can only contain letters and numbers'
        ]);

        if($request->new_password){
            $request->validate([
                'new_password' => 'required|string|min:8',
                'confirm-new-password' => 'required|string|same:new_password',
            ]);
        }

        // avatar upload
        if($request->hasFile('avatar')){
            $request->validate([
                'avatar' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            ]);
            if($user->avatar){
                Storage::delete($user->avatar);
            }
            $user->avatar = $request->avatar->store('avatars');
        }

        $user->name = $request->name;
        $user->email = $request->email;
        $user->username = $request->username;
        $user->whatsapp = $request->whatsapp;
        $user->about = $request->about;
        $user->suspended = $request->suspended ?? null;
        if($request->new_password){
            $user->password = bcrypt($request->new_password);
        }
        $user->save();

        return response()->json([
            'status' => 'success',
            'message' => 'User updated successfully.'
        ]);
    }

}
