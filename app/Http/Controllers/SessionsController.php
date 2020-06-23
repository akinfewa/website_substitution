<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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

        return redirect()->to('/');
    }

    public function destroy()
    {
        auth()->logout();

        return redirect()->to('/');
    }
}
