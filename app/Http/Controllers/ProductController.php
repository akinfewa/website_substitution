<?php

namespace App\Http\Controllers;

use DB;

class ProductController extends Controller
{
    public function displayProducts(){
		$product = DB::table('product')->get();
		return view('boutique', [
			'product' => $product,
			'number' => count($product),
		]);
	}
}