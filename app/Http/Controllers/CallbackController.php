<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Callback;

class CallbackController extends Controller
{
    public function postSendCallback(Request $request) {
        $this->validate($request, [
            'author' => 'required|max:100',
            'phone' => 'required|regex:/^((\+38)[\- ]?)?(\(?\d{3}\)?[\- ]?)?[\d\- ]{7,10}$/',
        ]);

        $callback = new Callback();
        $callback->author = $request['author'];
        $callback->phone = $request['phone'];
        $callback->body = $request['body'];
        $callback->attention = true;
        if ( $callback->save() ){
            return response()->json(['success' => 'Спасибо за Ваше обращение, Наши Специалисты свяжутся с вами в кратчайшие сроки']);
        }
        return response()->json(['fail' => 'Ошибка, попробуйте позже.']);
    }

    public function getAll() {
        $allData = Callback::paginate(10);
        return view('admin.callbacks', ['callbacks' => $allData]);
    }
}
