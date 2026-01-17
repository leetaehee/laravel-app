<?php

namespace App\Listeners;

use App\Events\MailSentEvent;
use App\Models\MailLog;
use Illuminate\Support\Facades\Log;

/**
 * 이메일 발송과 수신 로그 
 */
class WriteMailLogEventListener
{
    public function handle(MailSentEvent $event): void
    {
        if ($event->receiveIp || $event->receiveDatetime) {
            $log = MailLog::where('email', $event->email)
                ->where('kind', $event->kind)
                ->orderByDesc('send_datetime')
                ->first();

            if (!$log) {
                Log::info('Mail log not found for receive update', [
                    'kind' => $event->kind,
                    'email' => $event->email,
                ]);
                return;
            }

            $log->update([
                'receive_datetime' => $event->receiveDatetime ?? now(),
                'receive_ip' => $event->receiveIp,
            ]);

            Log::info('Mail receive logged', [
                'kind' => $event->kind,
                'email' => $event->email,
            ]);
            return;
        }

        MailLog::create([
            'kind' => $event->kind,
            'email' => $event->email,
            'token' => $event->token,
            'send_datetime' => now(),
            'sender' => $event->sender,
        ]);

        Log::info('Mail log created', [
            'kind' => $event->kind,
            'email' => $event->email,
        ]);
    }
}
