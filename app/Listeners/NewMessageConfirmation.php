<?php

namespace App\Listeners;

use App\Events\SendMessage;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class NewMessageConfirmation
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {

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
            'emails.new-message-confirmation',
            ['contact_message' => $contact_message],
            function($m)use($contact_message){
                $m->from('mp091689@gmail.com', 'СТО на Оболони');
                $m->to($contact_message->email,$contact_message->author);
                $m->subject('Мы получили Ваше сообщение');
            }
        );
    }
}
