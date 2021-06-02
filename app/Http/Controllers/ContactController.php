<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    //
    public function index()
    {
        $active = "contact";
        return view('home.contact')->with('active', $active);
    }
}
