<?php

namespace App\Http\Controllers\Front;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Services\VerificationServices;
use App\Http\Requests\Front\LoginRequest;
use App\Http\Requests\Front\RegisterRequest;

class AuthController extends Controller
{
    public $sms_services;
    public function __construct(VerificationServices $sms_services)
    {
        $this->sms_services = $sms_services;
    }
    public function username()
    {
        return 'mobile';
    }
    public function register()
    {

        return view('front.user.auth.register');

    }
    public function storUser(RegisterRequest $request)
    {

        try {

            DB::beginTransaction();
            $verification = [];

            $user = User::create($request->all());


            // send OTP SMS code
            // set/ generate new code

            $verification['user_id'] = $user->id;
            $verification_data = $this->sms_services->setVerificationCode($verification);
            $message = $this->sms_services->getSMSVerifyMessageByAppName($verification_data->code);
            //save this code in verifcation table
            //done
            //send code to user mobile by sms gateway   // note  there are no gateway credentails in config file
            # app(VictoryLinkSms::class) -> sendSms($user -> mobile,$message);
            DB::commit();
            return redirect()->route('users.login')->with('success', "Account successfully registered.");
            //send to user  mobile
        } catch (\Exception $ex) {
            DB::rollback();
            return redirect()->route('users.login')->with('danger', "there error.");

        }


    }
    public function login()
    {
        return view('front.user.auth.login');
    }
    public function checkLogin(LoginRequest $request)
    {
        // return $request;

        $remember = $request->remember_me ? true : false;

        $user = auth()->guard('web')->attempt(['mobile' => $request->mobile, 'password' => $request->password], $remember);

        if ($user) {
            return redirect()->route('front.home')->with('success', "you login successfully ");
        }
        return back()->withInput($request->only('mobile', 'remember_me'))->with('danger', 'wrong credintial');


    }


    public function logout()
    {
        auth()->guard('web')->logout();
        return redirect()->route('front.home')->with('success', "you logout successfuly.");

    }
}