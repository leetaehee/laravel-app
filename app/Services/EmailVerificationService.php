<?php

namespace App\Services;

use App\Jobs\SendVerifyEmailJob;
use App\Models\MailLog;
use App\Models\User;

/**
 * 회원가입 이메일 인증 서비스
 */
class EmailVerificationService
{
    /**
     * 큐 작업을 생성하고 이메일 인증 메일을 발송한다.
     *
     * @param User $user
     * @return void
     */
	public function issueAndSend(User $user) : void {
        // 6자리 숫자 추천(4자리 겹침 너무 많음)
	    $token = (string)random_int(100000,999999);

	    // fillable에 안 넣고 내부 로직으로만 갱신하려고 forceFill 사용
        // 업데이트 일자에 기록도면 안됨 
	    $user->forceFill([
		    'email_verify_token' => $token,
		    'email_verify_exp_datetime' => now()->addMinutes(30),
        ])->saveQuietly();

	    $log = MailLog::create([
		    'kind' => '회원가입인증',
            'email' => $user->email,
            'token' => $token,
            'send_datetime' => now(),
        ]);

        // 이메일 인증 발송 큐 작업 생성
	    SendVerifyEmailJob::dispatch($user->idx);
    }

    public function verify(int $idx, string $token, string $ip): string {
        $user = User::findOrFail($idx);

        // 이미 인증됨
        if ($user->email_verify_datetime) {
            return 'ok';
        }
        
        // 토큰 불일치
        if (!$user->email_verify_token || !hash_equals($user->email_verify_token, $token)) {
            return 'invalid';
        }
    
        // 만료
        if ($user->email_verify_exp_datetime && now()->greaterThan($user->email_verify_exp_datetime)) {
            return 'expired';
        }
    
        // 성공 -> 인증 완료 시각 찍고 토큰/만료 제거
        $user->forceFill([
            'email_verify_datetime' => now(),
            'email_verify_token' => null,
            'email_verify_exp_datetime' =>null,
        ])->saveQuietly();
    
        // 로그에 인증시각/IP 기록
        MailLog::where('email',$user->email)
              ->where('kind','회원가입인증')
              ->where('token',$token)
              ->first()
              ?->update([
                'receive_datetime' => now(),
                'receive_ip' => $ip,
            ]);
    
        return 'ok';
    }
}
