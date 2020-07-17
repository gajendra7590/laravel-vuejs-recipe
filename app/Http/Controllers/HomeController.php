<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function vueFrontEnd()
    {
        return view('index');
    }

    public function vueAdmin()
    {
        return view('admin-index');
    }


}
