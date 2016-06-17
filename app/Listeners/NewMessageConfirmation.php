<?php

namespace App\Listeners;

use App\Events\SendMessage;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;
use App\EmailTemplate;

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
        $template = EmailTemplate::where('id','1')->firstOrFail();
        $template->body = str_replace(
            [
                '[name]',
                '[email]',
                '[phone]',
                '[comment]'
            ],
            [
                $contact_message->author,
                $contact_message->email,
                $contact_message->phone,
                $contact_message->body
            ],
            $template->body
        );
        Mail::send(
            'emails.main',
            ['template' => $template],
            function($m)use($contact_message){
                $m->from('mp091689@gmail.com', 'СТО на Оболони');
                $m->to($contact_message->email,$contact_message->author);
                $m->subject('Мы получили Ваше сообщение');
            }
        );
    }
}
