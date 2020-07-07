<?php

namespace App\Http\Controllers;

use DB;
use Auth;

class MessagesController extends Controller
{
	function display(){
		if(Auth::check()){
			return view('messages');
		}else {
			return redirect()->to('/');
		}
	}
}
?>