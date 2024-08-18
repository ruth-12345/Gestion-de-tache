<?php

namespace App\Http\Controllers;

class WelcomeController extends Controller
{
    public function index()
    {
        $heureccente = date('H');

        return view('welcome', ['heureccente' => $heureccente]);
    }
}
