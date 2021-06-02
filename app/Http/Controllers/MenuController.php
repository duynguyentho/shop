<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categories;
class MenuController extends Controller
{
    //
    public function index()
    {
        $categories = Categories::orderBy('name')->get();
            $active = "menu";
            return view('home.menu')->with('active', $active)->with('categories', $categories);
    }
}
