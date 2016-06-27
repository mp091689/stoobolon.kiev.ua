<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Menu;
use App\Models\Page;
use App\Models\Setting;

class MenuController extends Controller
{
    public function getAll() {
        $paginate = Setting::where('key','admin_rows')->first();
        $menus = Menu::orderBy('sort')->paginate($paginate->value);
        $pages = Page::where('public','1')->get();
        return view('admin.menus', ['menus' => $menus, 'pages' => $pages]);
    }

    public function postCreate(Request $request) {
        $this->validate($request, [
            'title' => 'required|max:50',
            'sort' => 'required|unique:menus,sort',
        ]);
        $menu = new Menu();
        $menu->title = $request['title'];
        $menu->sort = $request['sort'];
        $menu->page_id = $request['page_id'];
        $menu->public = $request['public'] ? true : false;
        $menu->save();
        return redirect()->route('admin.get.menus')->with(['success' => 'Пункт меню "'.$request['title'].'" успешно создан']);
    }

    public function postEdit(Request $request) {
        $this->validate($request, [
            'title' => 'required|max:50',
            'sort' => 'required|unique:menus,sort,'.$request['id'],
        ]);
        $menu = Menu::find($request['id']);
        $menu->title = $request['title'];
        $menu->sort = $request['sort'];
        $menu->page_id = $request['page_id'];
        $menu->public = $request['public'] ? true : false;
        $menu->update();
        return redirect()->route('admin.get.menus')->with(['success' => 'Пункт меню "'.$request['title'].'" успешно сохранен']);
    }

    public function getDelete($id) {
        $menu = Menu::find($id);
        if (!$menu) {
            return redirect()->route('admin.get.menus')->with(['fail' => 'Пункт меню не найден']);
        }
        $menu->delete();
        return redirect()->route('admin.get.menus')->with(['success' => 'Пункт меню успешно удален']);
    }
}
