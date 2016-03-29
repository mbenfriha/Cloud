<?php

namespace App\Jobs;

use App\Jobs\Job;
use App\User;
use Request;
use Illuminate\Contracts\Mail\Mailer;

class SendMailAdmin extends Job
{

    /**
     * User Model.
     *
     * @var App\Models\User
     */
    protected $user;
    protected $message;
    protected $mail;

    /**
     * Create a new SendMailCommand instance.
     *
     * @param  App\Models\User  $user
     * @return void
     */
    public function __construct(User $user, $message, $mail)
    {
        $this->user = $user;
        $this->message = $message;
        $this->mail = $mail;
    }

    /**
     * Execute the job.
     *
     * @param  Mailer  $mailer
     * @return void
     */
    public function handle(Mailer $mailer)
    {
        $data = [
            'title'  => 'Un nouveau message',
            'intro'  => $this->message,
            'link'   => '',
            'active_code' => $this->user['active_code']
        ];


        $mailer->send('emails.auth.verify', $data, function($message) {
            $message->to($this->mail, $this->user['username'])
                ->subject(trans('un message'));
        });
    }
}
