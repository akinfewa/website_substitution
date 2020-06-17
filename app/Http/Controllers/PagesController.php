<?php

namespace App\Http\Controllers;

class PagesController extends Controller
{
    public function connexion()
    {
        return view('connexion');
    }

    public function contact()
    {
        return view('contact');
    }

    public function politique()
    {
        return view('politique');
    }

    public function conditions()
    {
        return view('conditions');
    }
    public function inscription()
    {
        return view('politique');
    }
    public function welcome()
    {
        return view('/');
    }
    public function apropos()
    {
        return view('apropos');
    }
}
