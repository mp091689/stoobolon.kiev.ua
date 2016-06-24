<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Menu;
use App\Models\Page;

class PageController extends Controller
{
    public function getPageIndex($alias = 'public'){
        $menus = Menu::where('public','1')->orderBy('sort','asc')->get();
        $page = Page::where('alias',$alias)->firstOrFail();

        if ($alias == 'public') {
            return view('pages.public', ['menus' => $menus, 'page' => $page]);
        } elseif ($alias == 'contacts') {
            return view('pages.contacts', ['menus' => $menus, 'page' => $page]);
        }
        return view('pages.single', ['menus' => $menus, 'page' => $page]);
    }
    
    public function getAll() {
        $allPages = Page::paginate(10);
        return view('admin.pages.pages', ['pages' => $allPages]);
    }

    public function getPage($id) {
        $page = Page::find($id);
        if (!$page) {
            return redirect()->route('admin.get.pages')->with(['fail' => 'Страница не найдена']);
        }
        return view('admin/pages/page', ['page' => $page]);
    }

    public function getCreate() {
        return view('admin.pages.page-create');
    }

    public function getEdit($id) {
        $page = Page::find($id);
        if (!$page) {
            return redirect()->route('admin.get.pages')->with(['fail' => 'Страница не найдена']);
        }
        return view('admin/pages/page-edit', ['page' => $page]);
    }

    public function postCreate(Request $request) {
        $this->validate($request, [
            'title' => 'required|max:100',
            'alias' => 'unique:pages,alias|regex:/^[-a-z0-9]+$/',
            'body' => 'required',
        ]);
        $page = new Page();
        $page->title = $request['title'];
        $page->alias = $request['alias'];
        $page->body = $request['body'];
        $page->public = $request['public'];
        $page->meta_title = $request['meta_title'];
        $page->meta_description = $request['meta_description'];
        $page->meta_keywords = $request['meta_keywords'];
        $page->save();
        return redirect()->route('admin.get.pages')->with(['success' => 'Страница успешно добавлена']);
    }

    public function postEdit(Request $request) {
        //dd($request['public']);
        $this->validate($request, [
            'title' => 'required|max:100',
            'alias' => 'regex:/^[-a-z0-9]+$/|unique:pages,alias,'.$request['id'],
            'body' => 'required',
        ]);
        $page = Page::find($request['id']);
        if (!$page) {
            return redirect()->route('admin.get.pages')->with(['fail' => 'Страница не найдена']);
        }
        $page->title = $request['title'];
        $page->alias = $request['alias'];
        $page->body = $request['body'];
        $page->public = $request['public'] ? true : false;
        $page->meta_title = $request['meta_title'];
        $page->meta_description = $request['meta_description'];
        $page->meta_keywords = $request['meta_keywords'];
        $page->update();
        return redirect()->route('admin.get.pages')->with(['success' => 'Страница успешно изменена']);
    }

    public function getDelete($id) {
        $page = Page::find($id);
        if (!$page) {
            return redirect()->route('admin.get.pages')->with(['fail' => 'Страница не найдена']);
        }
        $page->delete();
        return redirect()->route('admin.get.pages')->with(['success' => 'Страница успешно удалена']);
    }
}
