<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class LoginController extends Controller
{
    public function index ()
	{	
		return view('login');
	}
	
	public function login (Request $request)
	{
		if ( $request->username === 'admin@'.substr($request->root(), 7) && $request->password === 'qwerty' ){
			$request->session()->put('admin', true);
			
			return redirect('/');
		}
		return back()->withErrors(['Invalid credentials!']);;
	}
	
	public function logout (Request $request)
	{
		if (!$request->session()->get('admin')){
			abort(404);
		}
		$request->session()->forget('admin');
		
		return redirect('/');
	}
}
