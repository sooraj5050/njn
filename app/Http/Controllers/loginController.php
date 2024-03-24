<?php

namespace App\Http\Controllers;

use App\Mail\userMail;
use App\Models\User;
use Illuminate\Http\Request;
use illuminate\Support\str;
use Illuminate\Support\Facades\Mail;


class loginController extends Controller
{

    public function login()
    {
        return view('login');
    }

    public function login_access(Request $request)
    {
        $log = [
            'email'    => $request['email'],
            'password' => $request['password'],


        ];

        if (auth()->attempt($log, true)) {

            return redirect()->route('refined');
        } else {
            return redirect()->route('login')->with('message', 'invalid_login');
        }
    }

    public function logout()
    {
        auth()->logout();
        return redirect()->route('login');
    }

    public function forgot_password()
    {
        return view('forgot_password');
    }

    public function do_forgot_password(Request $request)
    {

        $email  = $request['email'];
        $users  = User::where('email', $email)->first();
        if ($users) {
            $token = Str::random(120);

            $users->update([
                'password_reset_token' => $token,

            ]);

            Mail::to($users->email)->send(new userMail($users, $token));
            return redirect()->route('forgot_password')->with('message1', 'please check your email to reset your password');
        } else {
            return redirect()->route('forgot_password')->with('message', 'Invalid email');
        }
    }




    public function reset_password($token)
    {
        $user = User::where('password_reset_token', $token)->first();

        if ($user) {
            $user->update([
                'password_reset_token' => 'Null',
            ]);
            return view('reset_password', compact('user'));
        } else {
            return redirect()->route('forgot_password')->with('message', 'Invalid token');
        }
    }

    public function do_reset_password(Request $request)
    {
        $id       = $request['id'];
        $password = $request['password'];
        $user     = User::where('id', $id)->first();

        if ($user) {
            $user->update([
                'password' => bcrypt($password),

            ]);
            return redirect()->route('login')->with('message1', 'please login with your new password');
        } else {
            return redirect()->route('login')->with('message1', 'something went wrong');
        }
    }
}
