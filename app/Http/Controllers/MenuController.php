<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Menu;
use App\Models\Page;

class MenuController extends Controller
{
    public function getAll() {
        $menus = Menu::orderBy('sort')->get();
        $pages = Page::where('public','1')->get();
        return view('admin.menus', ['menus' => $menus, 'pages' => $pages]);
    }

    public function postCreate(Request $request) {
        $this->validate($request, [
            'title' => 'required|max:50',
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
