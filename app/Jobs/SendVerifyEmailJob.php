<?php

namespace App\Jobs;

use App\Mail\VerifyEmailCodeMail;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Throwable;

/**
 * 회원가입 이메일 인증 큐 작업
 */
class SendVerifyEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct( 
        public int $idx
    ){}

    /**
     * 큐 작업 처리
     *
     * @return void
     */
    public function handle():void
    {
		$user = User::findOrFail($this->idx);
		
		$verifyUrl = route('email.verify', [
			'idx' => $user->idx,
			'token' => $user->email_verify_token,
		]);
		
		try {
			Log::info('Verify email send', [
				'action' => 'send',
				'model' => 'User',
				'user_idx' => $user->idx,
				'email' => $user->email,
			]);

			Mail::to($user->email)->send(
				new VerifyEmailCodeMail(
					user: $user,
					token: $user->email_verify_token,
					verifyUrl: $verifyUrl
		    ));
		} catch (Throwable $e) {
			Log::error('Verify email send failed', [
				'action' => 'send_failed',
				'model' => 'User',
				'user_idx' => $user->idx,
				'email' => $user->email,
				'error' => $e->getMessage(),
			]);
			 throw $e;
        }
    }
}
