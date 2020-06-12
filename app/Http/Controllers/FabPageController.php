<?php

namespace App\Http\Controllers;

use DB;

class FabPageController extends Controller
{
    public function displayFabPage(){
		$sum = DB::table('test')->get();
		return view('welcome', [
			'test' => $sum[0]->texte,
		]);
	}
}
