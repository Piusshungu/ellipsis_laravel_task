<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ECLMailer extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $subject;
    public $htmlContent;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user,$subject,$htmlContent)
    {
        $this->user = $user;
        $this->subject = $subject;
        $this->htmlContent = $htmlContent;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->to($this->user->email)
            ->subject($this->subject)
            ->html($this->htmlContent);
    }
}
