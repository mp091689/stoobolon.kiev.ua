<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\SocialButtons;

class SocialButtonsController extends Controller
{
    public function getAll() {
       $buttons = SocialButtons::all();
       return view('admin.socialbtns', ['buttons' => $buttons]);
    }
    
    public function postSetUrl(Request $request) {
        $btns = SocialButtons::all();
        foreach ( $btns as $btn ) {
            $this->validate($request, [
                $btn->title => 'url',
            ]);
            $url = SocialButtons::where('title',$btn->title)->first();
            $url->url = $request[$btn->title];
            $url->update();
        }
        return redirect()->route('admin.get.socialbuttons')->with(['success' => 'Ссылка успешно сохранена']);
    }
    
}
