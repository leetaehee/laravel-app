<?php

namespace App\Events;

use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class MailSentEvent
{
    use Dispatchable, SerializesModels;

    public function __construct(
        public string $kind,
        public string $email,
        public ?string $token = null,
        public ?int $sender = null,
        public ?string $receiveIp = null,
        public ?string $receiveDatetime = null,
    ) {
    }
}
