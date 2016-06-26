<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Callback;
use Illuminate\Support\Facades\Event;
use App\Events\SendCallbackMail;

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
            Event::fire(new SendCallbackMail($callback));
            return response()->json(['success' => 'Спасибо за Ваше обращение, Наши Специалисты свяжутся с вами в кратчайшие сроки']);
        }
        return response()->json(['fail' => 'Ошибка, попробуйте позже.']);
    }

    public function getAll() {
        
        $allData = Callback::orderBy('attention','desc')->orderBy('created_at','desc')->paginate(20);
        return view('admin.callbacks', ['callbacks' => $allData]);
    }

    public function getViewed($id){
        $callback = Callback::find($id);
        $callback->attention = false;
        $callback->save();
        return redirect()
            ->route('admin.get.callbacks')
            ->with(['success' => 'Запрос #'.$callback->id.' от '.$callback->author.'('.$callback->phone.') отмечен как "отработанный"']);
    }
}
