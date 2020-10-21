<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Notification;
use Illuminate\Support\Facades\Mail;
use App\Mail\EmailVerification;

use Illuminate\Http\Request;
use App\Setting;


class RegisterController extends Controller
{


    public function __construct()
    {
        $settings = Setting::find(1);
        \View::share('settings', $settings);
        $this->middleware('guest');
    }



    public function show(){
        return view('auth.register');
    }



    protected function store(Request $request){
        

        $request->validate([
            'email'     => 'required|email|unique:users',
            'password'  => 'required|confirmed|min:6',
        ]);


  
        $verification_key = \Str::random(10);

        $data = array(
            'name' => explode('@', $request->email)[0],
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'verification_key' => $verification_key,
        );

        $user =  User::create($data);

        if( $user ){

            Mail::to($request->email)->send( new EmailVerification($data));

            return redirect('/users/register/email/verification/'.$request->email);

        } else {
            return redirect()->back()->with('error', trans('validation.custom.feedback.something-wrong'));
        }
        

    }



    public function showVerification(Request $request){
        
        if($request->email){
            $email = $request->email;
            return view('auth.verify', compact('email'));
        } else {
            return redirect('/users/login');
        }
        

    }/* /showVerification() */



    public function resendVerification(Request $request){

        $user = User::where('email', $request->email)->first();

        if($user){
            
            $verification_key = \Str::random(10);

            $user->verification_key = $verification_key;
            $user->save();

            $data = array(
                'name' => $user->name,
                'email' => $user->email,
                'verification_key' => $verification_key,
            );

            Mail::to($request->email)->send( new EmailVerification($data));

            return redirect('/users/register/email/verification/'.$request->email);

        } else {
            return redirect('/users/register');
        }

        

    }/* /resendVerification() */



    public function activateAccount(Request $request){

        $request->validate([
            'email'     => 'required|email',
            'verification_key'  => 'required',
        ]);
        
        $user = User::where('email', $request->email)->where('verification_key', $request->verification_key)->first();

        if($user){
            
            $user->verification_key = null;
            $user->email_verified_at = \Carbon\Carbon::now();
            $user->save();

            return redirect('/users/login')->with('verification_success', trans('auth.register.email_verification_success'));
            
        } else {
            return redirect()->back()->with('error', trans('auth.failed'));
        }
        

    }/* /activateAccount() */


}/* /class */
