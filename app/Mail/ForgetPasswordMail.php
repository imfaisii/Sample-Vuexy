<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ForgetPasswordMail extends Mailable
{
    use Queueable, SerializesModels;
    public $user;
    public $link;
    public $mail_from;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user,$link)
    {
        //
        $this->user=$user;
        $this->link='http://127.0.0.1:8000/reset-password/'.$link;
        $this->mail_from=env('APP_NAME').' Reset Password ';
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject($this->mail_from)->view('mail.forget_password_mail');
    }
}
