<?php

namespace App\Http\Controllers;

use DB;

class FabPageController extends Controller
{
    public function displayFabPage(){
		$orders = DB::table('orders')->get();
		$number = count($orders);
		$product = DB::table('product')->get();
		$users = DB::table('users')->get();
		return view('fabPage', [
			'orders' => $orders,
			'number' => $number,
			'users' => $users,
			'products' => $product
		]);
	}
	public function receiveData(){
		
	}
} 
