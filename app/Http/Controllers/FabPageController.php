<?php

namespace App\Http\Controllers;

use DB;
use Auth;

class FabPageController extends Controller
{
    public function displayFabPage(){
		$orders = DB::table('orders')->get();
		$number = count($orders);
		$product = DB::table('product')->get();
		$users = DB::table('users')->get();
		if(Auth::user()->Fabman == 1){
			return view('fabPage', [
				'orders' => $orders,
				'number' => $number,
				'users' => $users,
				'products' => $product,
				'number_products' => count($product)
			]);
		}else {
			echo('<script>alert("Vous n\'êtes pas autorisé à accéder à cette page")</script>');//an alert() in js
			return view('welcome');
		}
	}
	public function receiveData(){
		if(request('whichOne') == "orders"){
			if(request('nextStep') == "yes"){
				$newShippingState = DB::table('orders')->where('ID', request('ID'))->get('ShippingState');
				$message = null;
				switch($newShippingState[0]->ShippingState){
					case 0 :
						$message = "Votre commande a été acceptée par l'un de nos fabmanager, elle est actuellement en cour de construction";
						break;
					case 1 :
						$message = "Votre commande a été produite par l'un de nos fabmanager, elle va vous être envoyée d'ici peu";
						break;
					case 2 :
						$message = "Votre commande a été envoyée, veuillez nous notifier lorsque vous l'aurez reçue";
						break;
				}
				DB::table('orders')->where('ID', request('ID'))->update(['ShippingState' => $newShippingState[0]->ShippingState+1]);
				DB::table('notifications')->insert([
					'ID_USERS' => Auth::user()->id,
					'text' => $message,
					'seen' => 0
				]);
				echo('<script>alert("Nous avons bien pris en compte l\'actualisation de l\'état de la commande")</script>');//an alert() in js
				$orders = DB::table('orders')->get();
				$number = count($orders);
				$product = DB::table('product')->get();
				$users = DB::table('users')->get();
				return view('fabPage', [
					'orders' => $orders,
					'number' => $number,
					'users' => $users,
					'products' => $product,
					'number_products' => count($product)
				]);
			}else {
				$newShippingState = DB::table('orders')->where('ID', request('ID'))->get('ShippingState');
				$message = null;
				switch($newShippingState[0]->ShippingState){
					case 0 :
						$message = "Votre commande a été refusée par l'un de nos fabmanager, veuillez prendre contact avec lui pour savoir quelle en est la raison";
						break;
					case 1 :
						$message = "Votre commande a été retirée de la file de production par l'un de nos fabmanager, veuillez prendre contact avec lui pour savoir quelle en est la raison";
						break;
					case 2	:
						$message = "L'un de nos fabmanager nous a signalé une erreure sur l'une de vos commandes, elle n'a en effet pas été construite, nous nous excusons pour la gêne occasionée";
						break;
				}
				DB::table('orders')->where('ID', request('ID'))->update(['ShippingState' => $newShippingState[0]->ShippingState-1]);
				DB::table('notifications')->insert([
					'ID_USERS' => Auth::user()->id,
					'text' => $message,
					'seen' => 0
				]);
				echo('<script>alert("Nous avons bien pris en compte l\'actualisation de l\'état de la commande")</script>');//an alert() in js
				$orders = DB::table('orders')->get();
				$number = count($orders);
				$product = DB::table('product')->get();
				$users = DB::table('users')->get();
				return view('fabPage', [
					'orders' => $orders,
					'number' => $number,
					'users' => $users,
					'products' => $product,
					'number_products' => count($product)
				]);
			}
		}else {
			for($i=1; $i<count(DB::table('product')->get())+1; $i++){
				DB::table('product')->where('ID', $i)->update(['ProdCapacity' => request($i)]);
			}
			$orders = DB::table('orders')->get();
			$number = count($orders);
			$product = DB::table('product')->get();
			$users = DB::table('users')->get();
			return view('fabPage', [
				'orders' => $orders,
				'number' => $number,
				'users' => $users,
				'products' => $product,
				'number_products' => count($product)
			]);
		}
	}
} 
