<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{


    public function index()
    {
        return view('site.home.index');
    }

    public function produto($id)
    {
        return view('site.home.produto');
    }
}
