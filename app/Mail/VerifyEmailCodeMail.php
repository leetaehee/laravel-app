<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

/**
 * 인증메일 발송용 Mailable 클래스
 */
class VerifyEmailCodeMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public function __construct(
        public string $token,
		public string $verifyUrl
    ) {}

    /**
     * 메일 제목 설정
     *
     * @return Envelope
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: sprintf('[%s] 이메일 인증 안내', config('app.name')),
        );
    }

    /**
     * 메일 본문 설정
     *
     * @return Content
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.verify_code',
            with: [
                'token' => $this->token,
                'verifyUrl' => $this->verifyUrl,
            ],
        );
    }

    /**
     * 메일 첨부파일 설정
     *
     * @return array
     */
    public function attachments(): array
    {
        return [];
    }
}
