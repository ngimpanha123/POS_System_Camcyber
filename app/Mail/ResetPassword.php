<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;


class ResetPassword extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public $details;
    public function __construct($details)
    {
        $this->details = $details;
    }

    public function build()
    {
        return $this->from(env('MAIL_FROM_ADDRESS', 'mrklokkh@gmai.com'), 'POS')->subject('Password Reset OTP')->view('reset-password');
    }
}
