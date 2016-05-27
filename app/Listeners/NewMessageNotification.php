<?php

namespace App\Listeners;

use App\Events\SendMessage;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class NewMessageNotification
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
     * @param  SendMessage  $event
     * @return void
     */
    public function handle(SendMessage $event)
    {
        $contact_message = $event->message;
        Mail::send(
            'emails.new-message-notification',
            ['contact_message' => $contact_message],
            function($m)use($contact_message){
                $m->from('mp091689@gmail.com', 'СТО на Оболони');
                $m->to('mp091689@gmail.com', 'sto obolon amin');
                $m->subject('Новый ЗАПРОС от:'.$contact_message->email);
            }
        );
    }
}
