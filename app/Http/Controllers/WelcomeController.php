<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        $heureccente=date('H');
        return view('welcome', ['heureccente'=>$heureccente]);
    }
}
