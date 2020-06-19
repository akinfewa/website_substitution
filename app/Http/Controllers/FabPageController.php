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
		if(request('nextStep') == "yes"){
			$newShippingState = DB::table('orders')->where('ID', request('ID'))->get('ShippingState');
			DB::table('orders')->where('ID', request('ID'))->update(['ShippingState' => $newShippingState[0]->ShippingState+1]);
			echo('<script>alert("Nous avons bien pris en compte l\'actualisation de l\'état de la commande")</script>');//an alert() in js
			return view('welcome');
		}else {
			$newShippingState = DB::table('orders')->where('ID', request('ID'))->get('ShippingState');
			DB::table('orders')->where('ID', request('ID'))->update(['ShippingState' => $newShippingState[0]->ShippingState-1]);
			echo('<script>alert("Nous avons bien pris en compte l\'actualisation de l\'état de la commande")</script>');//an alert() in js
			return view('welcome');
		}
	}
} 
