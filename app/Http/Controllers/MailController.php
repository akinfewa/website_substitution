<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Mail;
use App\Http\Requests;

class MailController extends Controller
{
  public function basic_email() {
    $data = array('name'=>"Zaroax");

    Mail::send(['text'=>'mail'], $data, function($message) {
       $message->to('damien@zaroax.eu', 'Damien ROBERT')->subject
          ('Confirmation de commande');
       $message->from('assovisieres.cesi@gmail.com','Associations visières - étudiants CESI Lyon');
    });
    return redirect()->to('/');
 }
}
