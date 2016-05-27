<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Message;
use App\Events\SendMessage;
use Illuminate\Support\Facades\Event;

class MessagesController extends Controller
{
    public function postSendMessage(Request $request)
    {
        $this->validate($request, [
            'author' => 'required|max:100',
            'email' => 'required|email',
            'phone' => 'required|regex:/^((\+38)[\- ]?)?(\(?\d{3}\)?[\- ]?)?[\d\- ]{7,10}$/',
            'body' => 'required|min:10',
        ]);

        $message = new Message();
        $message->author = $request['author'];
        $message->email = $request['email'];
        $message->phone = $request['phone'];
        $message->body = $request['body'];
        $message->save();
        Event::fire(new SendMessage($message));
        return redirect()->route('contacts')->with(['success' => 'Ваше сообщение успешно отправлено. Наши специалисты свяжутся с Вами в кратчайшие сроки.']);
    }
}
