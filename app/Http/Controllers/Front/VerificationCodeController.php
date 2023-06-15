<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\VerificationServices;
use App\Http\Requests\Front\VerificationRequest;

class VerificationCodeController extends Controller
{

    public $verificationService;
    public function __construct(VerificationServices $verificationService)
    {
        $this->verificationService = $verificationService;
    }

    public function verify(VerificationRequest $request)
    {
          $check = $this->verificationService->checkOTPCode($request->code);
        if (!$check) { // code not correct
            //  return 'you enter wrong code ';
            return redirect()->route('users.get.verification.form')->withErrors(['code' => 'ألكود الذي ادخلته غير صحيح ']);
        } else { // verifiction code correct
            $this->verificationService->removeOTPCode($request->code);
            return redirect()->route('front.home')->with('success', "Account successfully verified.");
        }
    }

    public function getVerifyPage()
    {
        return view('front.user.auth.verification');
    }
}