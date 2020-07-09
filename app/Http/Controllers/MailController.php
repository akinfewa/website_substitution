<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Mail;
use App\Http\Requests;
use DB;
use Auth;

class MailController extends Controller{

  private $tbCTX = [
          "validation"=>["Objet"=>"Confirmation de commande", "Contenu"=>"Bonjour, vous venez de commander une visière"],
  ];

public function basic_email($mailDestinataire, $userName, $product, $quantity) {
		$message = 'vous venez de commander une visière'.$quantity.' '.$product.'.';
		$data = array("body" => $message);
		try{
			Mail::send('mail', $data, function($message) use ($mailDestinataire, $userName) {
			  $message->to($mailDestinataire, $userName)
			  ->subject("Confirmation de commande");
			  $message->from('assovisieres.cesi@gmail.com','Associations visières - étudiants CESI Lyon');
		});
		} catch (Exception $e){
			echo $e;
		}
    }

	public function fabEmail($product, $quantity) {
		dump($quantity);
		$fabmanagers = DB::table('users')->where('Fabman', 1)->get();
		$message = 'L\'utilisateur '.Auth::user()->name.' '.Auth::user()->first_name.' a passé une nouvelle commande.';
		$message2 = 'Cette commande est constituée de '.$quantity.' '.$product.'.';
		$data = array("body" => $message, "body2" => $message2);
		for($i = 0; $i<count($fabmanagers);$i++){
			try{
				Mail::send('mailFabmanager', $data, function($message) use ($fabmanagers, $i) {
				  $message->to($fabmanagers[$i]->email, $fabmanagers[$i]->name)
				  ->subject("Nouvelle commande");
				  $message->from('assovisieres.cesi@gmail.com','Associations visières - étudiants CESI Lyon');
			});
			} catch (Exception $e){
				echo $e;
			}
		}
    }

	public function messagesEmail($mailDestinataire, $userName) {
		$message = 'L\'utilisateur '.Auth::user()->name.' '.Auth::user()->first_name.' vous a envoyé un nouveau message.';
		$data = array("body" => $message);
		try{
			Mail::send('mail', $data, function($message) use ($mailDestinataire, $userName) {
			  $message->to($mailDestinataire, $userName)
			  ->subject("Nouveau message");
			  $message->from('assovisieres.cesi@gmail.com','Associations visières - étudiants CESI Lyon');
		});
		} catch (Exception $e){
			echo $e;
		}
		//return redirect()->to('/login');
    }
}
