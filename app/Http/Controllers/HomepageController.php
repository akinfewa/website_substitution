<?php

namespace App\Http\Controllers;

use DB;

class HomepageController extends Controller
{
    public function displayHomepage(){
		return view('welcome');
	}

}
