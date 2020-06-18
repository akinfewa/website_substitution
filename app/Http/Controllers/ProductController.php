<?php

namespace App\Http\Controllers;

use DB;

class ProductController extends Controller
{
    public function displayProducts(){
		$product = DB::table('produit')->get();
		return view('welcome', [
			'test' => $product[0]->nom,
		]);
	}
}