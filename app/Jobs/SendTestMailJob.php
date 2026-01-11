<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendTestMailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct(
        public string $email
    ) {}

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Mail::raw('큐로 보내는 테스트 메일입니다.', function ($msg) {
            $msg->to($this->email)
                ->subject('Queue Test Mail');
        });
    }
}
