<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Validations\ValidMessage;
use Illuminate\Support\Facades\Mail;
use App\Mail\MessageSent;
use App\Mail\Message;

class ContactController extends Controller
{
	private $mail;
	
	// public function __construct(Mailer $mailer){
		// $this->mail = $mailer;
	// }
	
    public function index()
	{
		return view('contact');
	}
	
	public function store (ValidMessage $request)
	{
		dd(1);
		Mail::to('florinbotea777@gmail.com')->send(new Message( $request->all() ));
		Mail::to('florinbotea777@gmail.com')->send(new MessageSent());
		
		return back();
	}
}
