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
        $allData = Page::paginate(10);
        return view('admin.pages', ['pages' => $allData]);
    }
}
