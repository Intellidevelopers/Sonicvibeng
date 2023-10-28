<?php

namespace App\Http\Controllers;

use App\Mail\RegistrationMail;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;
use App\Models\GeneralSetting;
use App\Models\Password_reset;
use App\Models\User;

use Notification;
//use Mail;
use App\Notifications\sendEmailVerification;
use Illuminate\Support\Facades\Mail as FacadesMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;

class AuthController extends Controller
{
    public function signin()
    {
        $data = [];
        $data['title'] = "Signin";
        $data['settings'] = GeneralSetting::where('id', "1")->first();

        return view('home.signin')->with($data);
    }


    public function signup()
    {
        $data = [];
        $data['title'] = "Signup";
        $data['settings'] = GeneralSetting::where('id', "1")->first();

        return view('home.signin')->with($data);
    }
    public function signupAction(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'fullname' => ['required'],
            'username' => ['required'],
            'phone' => ['required'],
            'sex' => ['required'],
            'email' => ['required'],
            'password' => ['required']
        ]);

        if ($validate->fails()) {
            return back()->with('error', 'Registration is not successful');
        }
        $password = $request->password;
        $cpassword = $request->cpassword;
        $email = $request->email;

        $checkEmail = Admin::where('email', $email)->first();

        if (!empty($checkEmail) > 0) {
            return back()->with('error', 'Email already exist');
        }

        if ($password != $cpassword) {
            return back()->with('error', 'Password Dont match');
        }
       $email = $request->email;
       
            $post = new Admin();
            $post->fullname = $request->fullname;
            $post->phone = $request->phone;
            $post->password = Hash::make($password);
            $post->email = $request->email;
            $post->save();

        if($post){
                $mailData = [
                'title' => 'Mail from Mezutech.com',
                'body' => 'This is for testing email using smtp.'
            ];

            Mail::to($email)->send(new RegistrationMail($mailData));

            dd("Email is sent successfully.");
            
                return redirect('signin')->with('msg', 'Registration Successful');
        }
        
    }

    public function signinAction(Request $request)
    {
        $role = $request->role;
        $validate = Validator::make($request->all(), [
            'name' => 'required',
            'password' => 'required'
        ]);

        if ($validate->fails()) {
            return back()->with('error', 'Please fill up the empty space')->withInput();
        }

        $login = filter_var($request->input('name'), FILTER_VALIDATE_EMAIL) ? 'email' : 'phone';
        $request->merge([
            $login => $request->input('name')
        ]);

        $details = $request->only($login, 'password');
        //dd($details);
        if ($role == "user") {
            $user = User::where($login, $request->name)->first();
            if (is_null($user)) {
                return back()->with('error', 'Username or Email is incorrect');
            } else {
                if (Auth::guard('user')->attempt($details)) {
                    $request->session()->regenerate();
                    return redirect()->intended(route('dashboard'));
                } else {
                    return back()->with('error', 'Incorrect login details');
                }
            }
        } elseif ($role == "admin") {

            $admin = Admin::where($login, $request->name)->first();

            if (is_null($admin)) {
                return back()->with('error', 'Phone or Email is incorrect');
            } else {
                if (Auth::guard('admin')->attempt($details)) {
                    $request->session()->regenerate();
                    return redirect()->intended(route('admin.dashboard'));
                } else {
                    return back()->with('error', 'Incorrect login details');
                }
            }
        } else {
            return back()->with('error', 'You are not authorized to login');
        }
    }

    public function passwordRecover()
    {
        $data = [];
        $data['title'] = "Password Reset";

        return view('home.password_recover')->with($data);
    }

    public function passwordrecoverAction(Request $request)
    {
        $email = $request->email;

        $check = User::where('email', $email)->first();
        if (empty($check)) {
            return back()->with('error', 'Invalid Email');
        } else {
            $post = new Password_reset();
            $post->email = $request->email;
            $post->token = sha1(md5($email . rand(1000880, 99999999)));
            $post->save();
            return Redirect(url('new-password'));
        }
    }

    public function newPassword($token)
    {
        $data = [];
        $data['title'] = "New Password ";

        $token = $token;
        $check = Password_reset::where('token', $token)->first();
        if (empty($check)) {
            return redirect(route('signin'))->with('error', 'Invalid Token code');
        } else {
            $data['email'] = $check->email;
            return view('home.new_password')->with($data);
        }
    }

    public function updatepasswordAction(Request $request)
    {
        $password = $request->password;
        //dd($password);
        $cpassword = $request->cpassword;
        $email = $request->email;
        if ($password != $cpassword) {
            return back()->with('error', 'Confirm Password entered did not match with New password');
        }

        $check = User::where('email', $email)->first();
        if (empty($check)) {
            return back()->with('error', 'Invalid Authorization');
        } else {
            User::where('email', $email)->update(['password' => $password]);
            Password_reset::where('email', $email)->update(['token' => sha1(md5($email . rand(1000880, 99999999)))]);

            return redirect(route('signin'))->with('msg', 'Password updated successfully');
        }
    }
}