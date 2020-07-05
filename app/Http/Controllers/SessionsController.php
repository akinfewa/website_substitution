<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use DB;

class SessionsController extends Controller
{
  public function create()
  {
      return view('sessions.create');
  }

  public function store()
    {
        if (auth()->attempt(request(['email', 'password'])) == false) {
            return back()->withErrors([
                'message' => 'Le mail ou le mot de passe est incorrect.'
            ]);
        }
		if(Auth::check()){	
			$notifications = DB::table('notifications')->where('ID_USERS', Auth::user()->id)->get();
			session(['notifications' => $notifications]);
			session(['notifications_count' => count($notifications)]);
			$notifications = DB::table('notifications')->where('ID_USERS', Auth::user()->id)->where('seen', 0)->get();
			$unseen = false;
			if(count($notifications)>0){
				$unseen = true;
			}
			session(['unseen' => $unseen]);
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
		}
		

        return redirect()->to('/');
    }

    public function destroy()
    {
        auth()->logout();

        return redirect()->to('/');
    }
}
