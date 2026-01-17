<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

/**
 * 비밀번호 재설정 인증메일 Mailable 클래스
 */
class ResetPasswordMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public function __construct(
        public string $email,
        public string $returnUrl
    ) {}

    /**
     * 메일 제목 설정
     *
     * @return Envelope
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: sprintf('[%s] 비밀번호 재설정 인증 안내', config('app.name')),
        );
    }

    /**
     * 메일 본문 설정
     *
     * @return Content
     */
    public function content(): Content
    {
        // php8 생성자 이용하면 뷰에 with 안넘겨도 받을 수 있음
        return new Content(
            view: 'emails.reset_password',
            with: [
                'email' => $this->email,
                'returnUrl' => $this->returnUrl,
            ],
        );
    }

    /**
     * 메일 첨부파일 설정
     *
     * @return array
     */
    public function attachments(): array
    {
        return [];
    }
}
