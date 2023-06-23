<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Events\SendMail;
use App\Models\User;
use Mail;

class SendMailFired
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        $user=User::find($event->user_id)->toArray();
        $payload=[
            'name'=>$user['name'],
            'date'=>$user['created_at']
        ];
        Mail::send('eventMail', $payload, function ($message) use ($user) {
            $message->to($user['email']);
            $message->subject('Testing mail');
        });

        echo "Basic Email Sent. Check your inbox.";
    }
}
