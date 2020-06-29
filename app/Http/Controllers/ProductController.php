<?php

namespace App\Http\Controllers;

use DB;
use Auth;

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
		if(Auth::check()){
			DB::table('orders')->insert(
				['ID_product' => request('ID'), 'ID_USERS' => Auth::user()->id, 'Quantity' => request('Quantity'), 'ShippingState' => 0]
			);
			$quantity = DB::table('product')->where('ID', request('ID'))->get('ProdCapacity');
			DB::table('product')->where('ID', request('ID'))->update(['ProdCapacity' => (($quantity[0]->ProdCapacity)-request('Quantity'))]);
		}else {
			echo('<script>alert("Vous devez être connecté pour passer une commande")</script>');//an alert() in js
		}
        return view('welcome');
	}
}