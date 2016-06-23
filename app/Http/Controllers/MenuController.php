<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Menu;

class MenuController extends Controller
{
    public function getAll() {
        $allData = Menu::all();
        return view('admin.menus', ['menus' => $allData]);
    }
}
