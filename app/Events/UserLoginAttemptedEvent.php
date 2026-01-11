<?php

namespace App\Events;

use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class UserLoginAttemptedEvent
{
    use Dispatchable, SerializesModels;

    public function __construct(
        public string $email,
        public ?int $accessUserIdx,
        public string $ip,
        public string $userAgent,
        public bool $success,
        public string $provider = 'local',
        public ?string $reason = null,
    ) {
    }
}
