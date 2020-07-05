<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class sendmail extends Controller
{
  //$mail = new MailController();
    public function __construct(){
          $this->mail->basic_email($profile[0]->email,strtoupper($profile[0]->name).' '.ucfirst(strtolower($profile[0]->first_name)), "validation" );
    }

}
//$mail = new MailController();
//$mail->basic_email($profile[0]->email,strtoupper($profile[0]->name).' '.ucfirst(strtolower($profile[0]->first_name)), "validation" );
