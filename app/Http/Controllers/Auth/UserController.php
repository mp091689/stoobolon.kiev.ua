<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\User;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function getUser() {
        $user = User::where('name','admin')->first();
        if (!$user) {
            return redirect()->route('admin.get.user')->with(['fail' => 'Пользователь не найден']);
        }
        return view('admin.user', ['user' => $user]);
    }

    public function postSetEmail(Request $request) {
        $user = User::where('name','admin')->first();
        if (!$user) {
            return redirect()->route('admin.get.user')->with(['fail' => 'Пользователь не найден']);
        }
        $this->validate($request, [
            //'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            //'password' => 'required|min:6|confirmed',
        ]);
        $user->email = $request['email'];
        if ($user->update()) {
            return redirect()->route('admin.get.user')->with(['success' => 'Почта успешно изменена']);
        }
        return redirect()->route('admin.get.user')->with(['fail' => 'Что то пошло не так, обратитесь  в техподдержку']);
    }

    public function postSetPass(Request $request) {
        $user = User::where('name','admin')->first();
        if (!$user) {
            return redirect()->route('admin.get.user')->with(['fail' => 'Пользователь не найден']);
        }

        $request['pass'] = Hash::check($request['pass'],$user->password) ? 'yes' : 'no';

        $this->validate($request, [
            'pass' => 'required|accepted',
            'newpass' => 'required|min:6|confirmed',
        ]);

        $user->password = Hash::make($request['newpass']);
        if ( $user->update() ) {
            return redirect()->route('admin.get.user')->with(['success' => 'Пароль успешно изменен']);
        }
        return redirect()->route('admin.get.user')->with(['fail' => 'Что то пошло не так, обратитесь  в техподдержку']);
    }

}
