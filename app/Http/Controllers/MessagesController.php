<?php

namespace App\Http\Controllers;

use DB;
use Auth;

class MessagesController extends Controller
{
	function display(){
		if(Auth::check()){
			$conversations = DB::table('conversation')->where('ID_USERS_ONE', Auth::user()->id);
			$conversations = DB::table('conversation')->where('ID_USERS_TWO', Auth::user()->id)->union($conversations)->get();
			session(['conversations' => $conversations]);
			session(['conversations_count' => count($conversations)]);
			$unseen = false;
			$messages[0] = null;
			for($i = 0; $i<count($conversations); $i++){
				$messages[$i] = DB::table('messages')->where('ID_CONVERSATION', $conversations[$i]->ID)->get();
				if($conversations[$i]->seen == 0 && $messages[$i][count($messages[$i])-1]->ID_SENDER != Auth::user()->id){
					$unseen = true;
					DB::table('conversation')->where('ID', $i)->update(['seen' => 1]);
				}
			}
			session(['messages' => $messages]);
			session(['unseen_messages' => $unseen]);
			return view('messages');
		}else {
			return redirect()->to('/');
		}
	}
	
	function receiveData(){
		if(request('whoRU') == "started"){
			DB::table('messages')->insert([
				'ID_conversation' => request('conversationID'),
				'ID_SENDER' => Auth::user()->id,
				'text' => request('message'),
			]);
			$conversation = DB::table('conversation')->where('ID', request('conversationID'))->get();
			if($conversation[0]->ID_USERS_ONE == Auth::user()->id){
				$receiver = DB::table('users')->where('id', $conversation[0]->ID_USERS_TWO)->get();
			}else {
				$receiver = DB::table('users')->where('id', $conversation[0]->ID_USERS_ONE)->get();
			}
			$mail = new MailController();
			$mail->messagesEmail($receiver[0]->email,strtoupper($receiver[0]->name).' '.ucfirst(strtolower($receiver[0]->first_name)), "validation" );
		}else{
			$idConversation = count(DB::table('conversation')->get())+1;
			$user = DB::table('users')->where('email', request('email'))->get();
			if(count($user)<1){
				echo('<script>alert("L\'utilisateur que vous voulez contacter n\'existe pas")</script>');//an alert() in js
				return view('messages');
			}else{
				$conversations = DB::table('conversation')->where('ID_USERS_ONE', Auth::user()->id)->where('ID_USERS_TWO', $user[0]->id);
				$conversations = DB::table('conversation')->where('ID_USERS_TWO', Auth::user()->id)->where('ID_USERS_ONE', $user[0]->id)->union($conversations)->get();
				if(count($conversations)>=1) {
					echo('<script>alert("Vous avez déjà une conversation en cours avec cet utilisateur")</script>');//an alert() in js
					return view('messages');
				}
			}
			DB::table('conversation')->insert([
				'ID' => $idConversation,
				'ID_USERS_ONE' => Auth::user()->id,
				'ID_USERS_TWO' => $user[0]->id,
				'seen' => 0,
			]);
			DB::table('messages')->insert([
				'ID_conversation' => $idConversation,
				'ID_SENDER' => Auth::user()->id,
				'text' => request('text'),
			]);
			$mail = new MailController();
			$mail->messagesEmail($user[0]->email,strtoupper($user[0]->name).' '.ucfirst(strtolower($user[0]->first_name)), "validation" );
		}
		$conversations = DB::table('conversation')->where('ID_USERS_ONE', Auth::user()->id);
		$conversations = DB::table('conversation')->where('ID_USERS_TWO', Auth::user()->id)->union($conversations)->get();
		session(['conversations' => $conversations]);
		session(['conversations_count' => count($conversations)]);
		$unseen = false;
		for($i = 0; $i<count($conversations); $i++){
			$messages[$i] = DB::table('messages')->where('ID_CONVERSATION', $conversations[$i]->ID)->get();
			if($conversations[$i]->seen == 0 && $messages[$i][count($messages[$i])-1]->ID_SENDER != Auth::user()->id){
				$unseen = true;
				DB::table('conversation')->where('ID', $i)->update(['seen' => 1]);
			}
		}
		session(['messages' => $messages]);
		session(['unseen_messages' => $unseen]);
		return view('messages');
	}
}
?>