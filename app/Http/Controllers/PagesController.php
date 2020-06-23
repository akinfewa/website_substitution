<?php

namespace App\Http\Controllers;

use DB;

class PagesController extends Controller
{
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
    public function welcome()
    {
        return view('/');
    }
    public function apropos()
    {
        return view('apropos');
    }
    public function boutique()
    {
        return view('boutique');
    }
    public function commande()
    {
        return view('commande');
    }

}
