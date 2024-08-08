<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        $heurerécente=date('H');
        return view('welcome', ['heurerécente'=>$heurerécente]);
    }
}
