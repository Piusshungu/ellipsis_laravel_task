<?php

namespace App\Http\Traits;

use App\Mail\ECLMailer;
use Illuminate\Support\Facades\Mail;

trait SendResetNotification{
     /**
         * Send the password reset notification.
         *
         * @param  string  $token
         * @return void
         */
        public function sendPasswordResetNotification($token)
        {
                 $mailViewData = ['user' => $this,'actionUrl' => route('password.reset',$token),
                    'buttonName' => __('mail.reset.button'), 
                    'details' => __('mail.reset.footer')];

                    $subject = __('mail.reset.subject');
                    $view = view('emails.reset-password',$mailViewData)->render();

                     Mail::to($this->email)->send(new ECLMailer($this,$subject,$view));
        }
}