<?php

namespace App\Http\Controllers;

use DB;
use Auth;

class ProfileController extends Controller{

	public function display(){
		if(isset($_GET['a']) && $_GET['a']>=1){
			$allNotifications = DB::table('notifications')->get();
			$allNotificationsNumber = count($allNotifications);
			if($_GET['a']<=$allNotificationsNumber){
				if($allNotifications[$_GET['a']-1]->ID_USERS == Auth::user()->id){
					DB::table('notifications')->where('ID', $_GET['a'])->update(['seen' => 1]);
					$notifications = DB::table('notifications')->where('ID_USERS', Auth::user()->id)->get();
					session(['notifications' => $notifications]);
					session(['notifications_count' => count($notifications)]);
					$notifications = DB::table('notifications')->where('ID_USERS', Auth::user()->id)->where('seen', 0)->get();
					$unseen = false;
					if(count($notifications)>0){
						$unseen = true;
					}
					session(['unseen' => $unseen]);
				}
			}
		}
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
	
	public function modifications(){
		if(Auth::check()){
			return view('profileModifications');
		}else {
			return view('welcome');
		}
	}
	
	public function modifying(){
        if (auth()->attempt(request(['email', 'password'])) == true) {
			if(request('hidden') == "password"){
				DB::table('users')->where('id', Auth::user()->id)->update(['password' => bcrypt(request(['newPassword'][0]))]);
			}else {
				DB::table('users')->where('id', Auth::user()->id)->update(['email' => request(['newEMail'][0])]);
			}
			echo('<script>alert("Votre modification a bien été prise en compte")</script>');//an alert() in js
			return view('welcome');
		}else {
			echo('<script>alert("Votre email ou mot de passe est incorrect")</script>');//an alert() in js
			if(Auth::check()){
				return view('profileModifications');
			}else {
				return view('welcome');
			}
		}
	}
}