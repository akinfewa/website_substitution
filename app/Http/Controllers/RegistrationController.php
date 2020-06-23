<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;

class RegistrationController extends Controller
{
    public function create()
    {
      return view('registration.create');
    }

    public function store()
    {
      $this->validate(request(), [
            'name' => 'required',
            'first_name' => 'required',
            'company' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed'

      ]);

      $user = User::create(request(['name', 'first_name', 'company', 'email', 'password']));

      auth()->login($user);

      return redirect()->to('/');
    }
}
