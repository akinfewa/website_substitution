<?php

namespace App\Http\Controllers;

use DB;
use Auth;

class layoutFormController extends Controller
{
	function receiveData(){
		echo(request('conversationID'));
	}
}
?>