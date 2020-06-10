<?php

namespace App\Http\Controllers;

use DB;

class HomepageController extends Controller
{
    public function displayHomepage(){
		$sum = DB::table('test')->get();
		return view('welcome', [
			'test' => $sum[0]->texte,
		]);
	}
}
