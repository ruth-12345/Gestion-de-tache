<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        $heure=date('H:i:s');
        return view('welcome', ['heure'=>$heure]);
    }
}
