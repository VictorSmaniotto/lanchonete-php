<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{


    public function index()
    {
        return view('site.home.index');
    }

    public function produto()
    {
        return view('site.home.produto');
    }
}
