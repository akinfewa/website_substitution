<?php

namespace App\Http\Controllers;

use DB;
use Auth;

class ProfileController extends Controller{

	public function display(){
		if(Auth::check()){
			$profile = DB::table('users')->where('ID', Auth::user()->id)->get();
			$orders = DB::table('orders')->where('ID_USERS', Auth::user()->id)->get();
			$products = DB::table('product')->get('Name');
		return view('profile', [
			'orders' => $orders,
			'profile' => $profile,
			'number' => count($orders),
			'products' => $products
		]);
		}else{
			echo('<script>alert("Vous devez être connecté pour accéder aux informations de votre profil")</script>');//an alert() in js
			return view('welcome');
		}
	}
	public function received(){
		if(request('received')=="on"){
			DB::table('orders')->where('ID', request('ID'))->update(['ShippingState' => 4]);
			echo('<script>alert("Nous sommes heureux d\'apprendre que vous avez reçu votre commande")</script>');//an alert() in js
			return view('welcome');
		}else {
			display();
		}
	}
}