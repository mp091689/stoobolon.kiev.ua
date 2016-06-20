<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\CallBack;
use Illuminate\Support\Facades\Event;
use App\Events\SendCallBack;

class CallBackController extends Controller
{
    public function postSendCallBack(Request $request)
    {
        $this->validate($request, [
            'author' => 'required|max:100',
            'phone' => 'required|regex:/^((\+38)[\- ]?)?(\(?\d{3}\)?[\- ]?)?[\d\- ]{7,10}$/',
//            'body' => 'required|min:10',
        ]);

        $callback = new CallBack();
        $callback->author = $request['author'];
        $callback->phone = $request['phone'];
        $callback->body = $request['body'];
        Event::fire(new SendCallBack($callback));
        if ( $callback->save() ){
            return response()->json(['success' => 'Спасибо за Ваше обращение, Наши Специалисты свяжутся с вами в кратчайшие сроки']);
        }
        return response()->json(['fail' => 'Ошибка, попробуйте позже.']);
    }
}
