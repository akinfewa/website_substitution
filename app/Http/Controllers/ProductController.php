<?php

namespace App\Http\Controllers;

use DB;

class ProductController extends Controller
{
    public function displayProducts(){
		$sum = DB::table('test')->get();
		return view('welcome', [
			'test' => $sum[0]->texte,
		]);
	}
}
