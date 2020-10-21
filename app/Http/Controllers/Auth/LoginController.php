<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\ResetPasswordMail;
use Illuminate\Support\Facades\Hash;
use App\Setting;

class LoginController extends Controller
{
    

    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $settings = Setting::find(1);
        \View::share('settings', $settings);
        $this->middleware('guest')->except('logout');
    }




    public function show(){
        return view('auth.login');
    }

    public function store(Request $request){
        
        $request->validate([
            'email'     => 'required|email',
            'password'  => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication passed... will check if this is an admin or a user later in dashboard if this is an admin = redirect to "/admin/dashboard"
            if(!auth()->user()->email_verified_at){
                Auth::logout();
                return redirect('/users/register/email/verification/'.$request->email);
            }

            if( $request->url ){
                return redirect($request->url);
            } else {
                return redirect('/dashboard');
            }
    
            
        }

        // if the code reaches this line = login info is incorrect redirect to login with message
        return redirect()->back()->with('error', trans('auth.failed'));


    }


    public function logout(){
        Auth::logout();
        return redirect('/users/login')->with('logout', trans('auth.logout'));
    }







    public function forgetPasswordView(){
        return view('auth.passwords.verification-send');
    }/* /forgetPasswordView() */













    public function forgetPasswordSendVerification(Request $request){
        
        $this->validate( $request, [
            'email' => 'required|email',
        ]);



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

            Mail::to($request->email)->send( new ResetPasswordMail($data));

            return redirect('/users/login/forget-password/verify/'.$request->email);

        } else {
            return redirect('/users/register');
        }  
    }/* /forgetPasswordSendVerification() */




    
    public function forgetPasswordResendVerification(Request $request)
    {
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

            Mail::to($request->email)->send( new ResetPasswordMail($data));

            return redirect('/users/login/forget-password/verify/'.$request->email);

        } else {
            return redirect('/users/register');
        }

    }/* /forgetPasswordResendVerification() */












    public function forgetPasswordVerifyView(Request $request){
        if($request->email){
            $email = $request->email;
            return view('auth.passwords.verification-check', compact('email'));
        } else {
            return redirect('/users/login');
        }
    }/* /forgetPasswordVerifyView() */




    public function forgetPasswordVerify(Request $request)
    {   
   
        $this->validate($request,[
            'verification_key' => 'required',
            'password'  => 'required|confirmed|min:6',
        ]);

        $user = User::where('email', $request->email)->where('verification_key', $request->verification_key)->first();

        if($user){
     
            $user->verification_key = null;
            $user->password = Hash::make($request->password);
            $user->save();

            return redirect('/users/login')->with('verification_success', trans('auth.password_reset_success'));
            
        } else {
            return redirect()->back()->with('error', trans('auth.failed'));
        }
       
        
    }/* /forgetPasswordVerify() */



    



}/* /class */