<?php

namespace App\Listeners;

use App\Events\UserLoginAttemptedEvent;
use App\Models\LoginLog;
use Illuminate\Support\Facades\Log;

class WriteLoginLogEventListener
{
    public function handle(UserLoginAttemptedEvent $event): void
    {
        LoginLog::create([
            'email' => $event->email,
            'ip' => $event->ip,
            'access_datetime' => now(),
            'access_user_idx' => $event->accessUserIdx ?? 0,
            'user_agent' => $event->userAgent,
            'success_flag' => $event->success ? 1 : 0,
            'login_provider' => $event->provider,
        ]);

        if (!$event->success && $event->reason) {
            // 실패 시 로그파일 남김 
            Log::info('User login failed reason', [
                'email' => $event->email,
                'ip' => $event->ip,
                'reason' => $event->reason,
            ]);
        }
    }
}
