<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Setting;

class SettingsController extends Controller
{

    public function getSettings() {
        $settings = Setting::all();
        foreach ($settings as $obj) {
            $newSettings[$obj->key] = $obj->value;
        }
        $settings = (object)$newSettings;
        return view('admin.settings', ['setting' => $settings]);
    }

    public function postSet(Request $request) {

        $successMsg = 'Настройки успешно сохранены';

        if ( isset($request['site_name']) ) {
            $this->validate($request, [
                'site_name' => 'required|max:50',
            ]);
            $site_name = Setting::where('key','site_name')->first();
            $site_name->value = $request['site_name'];
            $site_name->update();
            return redirect()->route('admin.get.settings')->with(['success' => $successMsg]);
        }

        if ( isset($request['emails']) ) {
            $this->validate($request, [
                'emails' => 'required',
            ]);
            $emails = Setting::where('key','emails')->first();
            $emails->value = $request['emails'];
            $emails->update();
            return redirect()->route('admin.get.settings')->with(['success' => $successMsg]);
        }

        if ( isset($request['maps']) ) {
            $maps = Setting::where('key','maps')->first();
            $maps->value = $request['maps'];
            $maps->update();
            return redirect()->route('admin.get.settings')->with(['success' => $successMsg]);
        }

        if ( isset($request['article_rows']) ) {
            $this->validate($request, [
                'article_rows' => 'required|numeric|min:3',
            ]);
            $article_rows = Setting::where('key','article_rows')->first();
            $article_rows->value = $request['article_rows'];
            $article_rows->update();
            return redirect()->route('admin.get.settings')->with(['success' => $successMsg]);
        }

        if ( isset($request['review_rows']) ) {
            $this->validate($request, [
                'review_rows' => 'required|numeric|min:3',
            ]);
            $review_rows = Setting::where('key','review_rows')->first();
            $review_rows->value = $request['review_rows'];
            $review_rows->update();
            return redirect()->route('admin.get.settings')->with(['success' => $successMsg]);
        }

        if ( isset($request['admin_rows']) ) {
            $this->validate($request, [
                'admin_rows' => 'required|numeric|min:3',
            ]);
            $admin_rows = Setting::where('key','admin_rows')->first();
            $admin_rows->value = $request['admin_rows'];
            $admin_rows->update();
            return redirect()->route('admin.get.settings')->with(['success' => $successMsg]);
        }

        return redirect()->route('admin.get.settings')->with(['fail' => 'SettingsController@postSte не описана конфигурация, которую вы пытаетесь записать']);

    }

}
