<?php

namespace App\Jobs;

use App\Events\MailSentEvent;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Throwable;

/**
 * 메일 발송 큐 작업
 */
class SendMailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct( 
        public string $email,
        public Mailable $mailable,
        public string $kind,
        public ?string $token = null,
        public ?int $userIdx = null,
    ){}

    /**
     * 큐 작업 처리
     *
     * @return void
     */
    public function handle():void
    {
		try {
			Log::info('Mail send', [
				'action' => 'send',
				'model' => 'User',
				'user_idx' => $this->userIdx,
				'email' => $this->email,
			]);

			Mail::to($this->email)->send($this->mailable);

            event(new MailSentEvent(
                kind: $this->kind,
                email: $this->email,
                token: $this->token,
                sender: null,
            ));

		} catch (Throwable $e) {
			Log::error('Mail send failed', [
				'action' => 'send_failed',
				'model' => 'User',
				'user_idx' => $this->userIdx,
				'email' => $this->email,
				'error' => $e->getMessage(),
			]);
			 throw $e;
        }
    }
}
