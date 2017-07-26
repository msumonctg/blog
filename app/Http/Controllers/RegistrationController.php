<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

class RegistrationController extends Controller
{
    public function create()
    {
    	return view('registrations.create');
    }

    public function store()
    {
    	$this->validate(request(), [
    		'name' => 'required|min:3',
    		'email' => 'required|email',
    		'password' => 'required|min:8|confirmed',
    	]);

    	$user = User::create([
    		'password' => bcrypt(request('password')),
    		'name' => request('name'),
    		'email' => request('email'),
    	]);

    	auth()->login($user);

    	return redirect('/');
    }
}
