<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\EmailVerificationService;
use Illuminate\Http\Request;

/**
 * 회원가입 이메일 인증 컨트롤러
 */
class EmailVerifyController extends Controller
{
    /**
     * 이메일 인증
     *
     * @param Request $request
     * @param EmailVerificationService $evs
     * @return void
     */
    public function verify(Request $request, EmailVerificationService $evs)
    {
		$inputs = $request->validate([
		    'idx' => ['required','integer'],
			'token' => ['required','string'],
        ]);

		$result = $evs->verify(
            idx: (int)$inputs['idx'],
            token: $inputs['token'],
            ip: $request->ip(),
	    );

		if ($result === 'expired') {
            $user = User::findOrFail((int)$inputs['idx']);
            $evs->issueAndSend($user);
			return redirect()
                ->route('users.login')
                ->with('status','토큰 만료로 인증메일을 재발송했습니다.');
        }

		if ($result !== 'ok') {
			return redirect()
                ->route('users.login')
                ->with('status','인증 실패(토큰 오류/만료)');
        }

		return redirect()->route('users.login')->with('status', '인증 완료되었습니다. 로그인 해주세요.');
    }

    /**
     * 인증메일 재발송
     *
     * @param Request $request
     * @param EmailVerificationService $evs
     * @return void
     */
    public function resend(Request $request, EmailVerificationService $evs)
    {
		$user = $request->user();

		if ($user->email_verify_datetime) {
			return back()->with('ok','이미 인증된 계정입니다.');
        }

        $evs->issueAndSend($user);

		return back()->with('ok','인증메일을 재발송했습니다.');
    }
}
