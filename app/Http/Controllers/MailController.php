<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Mail;
use App\Http\Requests;

class MailController extends Controller{

  private $tbCTX = [
          "validation"=>["Objet"=>"Confirmation de commande", "Contenu"=>"<h1>Bonjour</h1><br>Vous avez une visière"],
          "annulation"=>["Objet"=>"Annulation de commande", "Contenu"=>"<h1>Bonjour</h1><br>Vous avez plus une visière"],
  ];

public function basic_email($mailDestinataire, $userName, $contexte) {
    $data = array('name'=>"Zaroax");

    try{
        Mail::send($this->tbCTX[$contexte]['Contenu'], $data, function($message) {
          $message->to($mailDestinataire, $userName)->subject
          ($this->tbCTX[$contexte]['Objet']);
          $message->from('assovisieres.cesi@gmail.com','Associations visières - étudiants CESI Lyon');
    });
    } catch (Exception $e){
        echo $e;
    }
    return redirect()->to('/');
     }
}
