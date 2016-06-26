<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\EmailTemplate;

class EmailTemplateController extends Controller
{
    public function getAll() {
        $allData = EmailTemplate::all();
        return view('admin.emails.emails', ['emails' => $allData]);
    }

    public function getById($id) {
        $email = EmailTemplate::find($id);
        if (!$email) {
            return redirect()->route('admin.get.emails')->with(['fail' => 'Шаблон не найден']);
        }
        return view('admin/emails/email', ['email' => $email]);
    }

    public function getEdit($id) {
        $email = EmailTemplate::find($id);
        if (!$email) {
            return redirect()->route('admin.get.emails')->with(['fail' => 'Шаблон не найден']);
        }
        return view('admin/emails/email-edit', ['email' => $email]);
    }

    public function postEdit(Request $request) {
        $this->validate($request, [
            'title' => 'required|max:100',
            'body' => 'required',
        ]);
        $email = EmailTemplate::find($request['id']);
        if (!$email) {
            return redirect()->route('admin.get.emails')->with(['fail' => 'Шаблон не найден']);
        }
        $email->title = $request['title'];
        $email->body = $request['body'];
        $email->active = $request['active'] ? true : false;
        $email->update();
        return redirect()->route('admin.get.emails')->with(['success' => 'Шаблон успешно изменен']);
    }

}
