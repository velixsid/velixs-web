<?php

namespace App\Http\Controllers;

use App\Helpers\Layouts;
use Illuminate\Support\Str;
use App\Models\User;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;

class AuthController extends Controller
{

    public function index(Request $request){
        if($request->method() == 'POST' && $request->ajax()){
            $request->validate([
                'username' => 'required',
                'password' => 'required',
            ]);

            $user = User::where('username', $request->username)->orWhere('email', $request->username)->first();
            if($user){
                if(password_verify($request->password, $user->password)){
                    Auth::login($user, (bool)$request->remember);
                    return response()->json([
                        'message' => 'Login success. Redirecting...',
                        'redirect' => $request->session()->get('url.intended', route('main')),
                    ]);
                }else{
                    return response()->json([
                        'message' => 'Password is incorrect.'
                    ], 422);
                }
            }else{
                return response()->json([
                    'message' => 'Username or email is incorrect.'
                ], 422);
            }
        }else{
            $data['seo'] = (object)[
                'title' => 'Sign In',
            ];
            return Layouts::view('auth.login', $data);
        }
    }

    public function register(Request $request){
        if($request->method() == 'POST' && $request->ajax()) {
            $request->validate([
                'fullname' => 'required',
                'username' => 'required|unique:users,username',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|min:8',
            ]);

            $user = new User();
            $user->name = $request->fullname;
            $user->username = $request->username;
            $user->email = $request->email;
            $user->password = bcrypt($request->password);
            $user->save();

            Auth::login($user, true);
            return response()->json([
                'message' => 'Register success. Redirecting...',
            ]);
        } else {
            $data['seo'] = (object)[
                'title' => 'Sign Up',
            ];
            return Layouts::view('auth.register',$data);
        }
    }

    public function forgot(Request $request) {
        if($request->method() == 'POST') {
            $request->validate([
                'email' => 'required|email',
            ]);

            $status = Password::sendResetLink(
                $request->only('email')
            );

            return $status === Password::RESET_LINK_SENT ? back()->with('success', ['title'=> 'Email Sent.', 'message' => 'We have sent a password reset link to your email address. Please check your email inbox and follow the instructions inside to reset your password']) : back()->withErrors(['email' => __($status)]);
        } else {
            $data['seo'] = (object)[
                'title' => 'Forgot Password',
            ];
            return Layouts::view('auth.forgot',$data);
        }
    }

    public function reset($token){
        $email = request()->get('email');
        if(!$email || !$token) return redirect()->route('login')->with('info', ['title' => 'Reset Password', 'message' => 'Please check your email inbox and follow the instructions inside to reset your password']);
        return Layouts::view('auth.reset', ['token' => $token, 'email' => $email]);
    }

    public function resetpost(Request $request){
        if($request->method() == 'POST' && $request->ajax()){
            $request->validate([
                'token' => 'required',
                'email' => 'required|email',
                'password' => 'required|min:8',
                'password_confirmation' => 'required|same:password',
            ]);

            $status = Password::reset(
                $request->only('email', 'password', 'password_confirmation', 'token'),
                function (User $user, string $password) {
                    $user->forceFill([
                        'password' => bcrypt($password),
                    ])->setRememberToken(Str::random(60));

                    $user->save();

                    event(new PasswordReset($user));
                }
            );

            return $status === Password::PASSWORD_RESET
                        ? response()->json([
                            'message' => 'Password reset success. Redirecting...',
                        ])
                        : response()->json([
                            'message' => __($status),
                        ], 422);
        }
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('login')->with('success', [
            'title' => 'Logout Success',
            'message' => 'You have been logged out.',
        ]);
    }
}
