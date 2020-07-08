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
	
	function receiveData(){
		DB::table('messages')->insert([
			'ID_conversation' => request('conversationID'),
			'ID_SENDER' => Auth::user()->id,
			'text' => request('message'),
		]);
		$conversations = DB::table('conversation')->where('ID_USERS_ONE', Auth::user()->id);
		$conversations = DB::table('conversation')->where('ID_USERS_TWO', Auth::user()->id)->union($conversations)->get();
		session(['conversations' => $conversations]);
		session(['conversations_count' => count($conversations)]);
		$unseen = false;
		for($i = 0; $i<count($conversations); $i++){
			$messages[$i] = DB::table('messages')->where('ID_CONVERSATION', $conversations[$i]->ID)->get();
			if($conversations[$i]->seen == 0 && $messages[$i][count($messages[$i])-1]->ID_SENDER != Auth::user()->id){
				$unseen = true;
			}
		}
		session(['messages' => $messages]);
		session(['unseen_messages' => $unseen]);
		return view('messages');
	}
}
?>