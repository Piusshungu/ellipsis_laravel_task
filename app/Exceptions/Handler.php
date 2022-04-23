<?php

namespace App\Exceptions;

use App\Mail\ECLMailer;
use App\Models\User;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {

        $this->renderable(function (NotFoundHttpException $e, $request) {

            if (request()->is('short/*')) {
                //Send Email to all users (Assuming all are admins at this time)
                // TODO: Supervisor should be used to handle all application jobs including bulk emails
                //TODO: Cron jobs should be added in the server to notify admin on broken links
                //Roles and Permissions should be in place to enforce only admins to receive on broken links
                $admins = User::all();

                foreach ($admins as $user) {
                    $mailViewData = [
                        'user' => $user, 'actionUrl' => url()->current(),
                        'link' => url()->current(),
                        'buttonName' => __('mail.link.button'),
                        'details' => __('mail.link.footer')
                    ];

                    $subject = __('mail.link.subject');
                    $view = view('emails.link-expired', $mailViewData)->render();
                }

                Mail::to($user->email)->send(new ECLMailer($user, $subject, $view));
            }
        });
    }
}
