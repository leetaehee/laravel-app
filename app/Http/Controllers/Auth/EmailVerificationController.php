<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use http\Env\Request;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

class EmailVerificationController extends Controller
{
    public function verify(EmailVerificationRequest $request)
    {
        $request->fulfill();

        return redirect()->to(RouteServiceProvider::HOME);
    }

    public function notice()
    {
        return view('auth.verify-email');
    }

    public function send(Request $request)
    {
        $user = $this->user();

        $user->sendEmailVerificationNotification();

        return back();
    }
}
