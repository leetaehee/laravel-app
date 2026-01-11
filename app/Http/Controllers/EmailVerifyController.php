<?php

namespace App\Http\Controllers;

use App\Services\EmailVerificationService;
use Illuminate\Http\Request;

/**
 * 회원가입 이메일 인증 컨트롤러
 */
class EmailVerifyController extends Controller
{
    public function verify(Request $request, EmailVerificationService $svc)
    {
		$inputs = $request->validate([
		    'idx' => ['required','integer'],
			'token' => ['required','string'],
        ]);

		$ok = $svc->verify(
            idx: (int)$inputs['idx'],
            token: $inputs['token'],
            ip: $request->ip(),
	    );

		if (!$ok) {
			return redirect()->route('users.login')->with('status','인증 실패(토큰 오류/만료)');
        }

		return redirect()->route('users.login')->with('status', '인증 완료되었습니다. 로그인 해주세요.');
    }
}
