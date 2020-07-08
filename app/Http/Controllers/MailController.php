<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Mail;
use App\Http\Requests;
use DB;

class MailController extends Controller{

  private $tbCTX = [
          "validation"=>["Objet"=>"Confirmation de commande", "Contenu"=>"Bonjour, vous venez de commander une visière"],
          "annulation"=>["Objet"=>"Annulation de commande", "Contenu"=>"<h1>Bonjour</h1><br>Vous avez plus une visière"],
  ];

public function basic_email($mailDestinataire, $userName, $contexte) {
    $data = array("body" => $this->tbCTX[$contexte]['Contenu']);
    try{
        Mail::send('mail', $data, function($message) use ($mailDestinataire, $userName, $contexte) {
          $message->to($mailDestinataire, $userName)
		  ->subject($this->tbCTX[$contexte]['Objet']);
          $message->from('assovisieres.cesi@gmail.com','Associations visières - étudiants CESI Lyon');
    });
    } catch (Exception $e){
        echo $e;
    }
    return redirect()->to('/');
    }
}

public function fabEmail($product, $quantity) {
	$fabmanagers = DB::table('users')->where(Fabman, 1)->get();
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
    return redirect()->to('/');
    }
}
