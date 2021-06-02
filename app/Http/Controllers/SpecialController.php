<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categories;
class SpecialController extends Controller
{
    //
    public function index()
    {
        $active="special";
        $categories = Categories::inRandomOrder()->limit(6)->get();
        return view('home.special')->with('active',$active)->with('categories', $categories);
    }
}
