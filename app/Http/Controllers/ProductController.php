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
	
	public function orderManagement(){
		DB::table('orders')->insert(
			['ID_product' => request('ID'), 'ID_USERS' => 1, 'Quantity' => request('Quantity'), 'ShippingState' => 0]
		);
        return view('welcome');
	}
}