<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index()
    {
        # code...
        $active="home";
        return view('home.home')->with('active',$active);
    }
}
