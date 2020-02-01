<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use MimeTyper\Repository\MimeDbRepository;

class DevController extends Controller
{
	public function test(Request $request)
	{
		$mimeRepository = new MimeDbRepository();

		dd(\Request::root());
		return view('emails.messageSent');
		Mail::to('florinbotea777@gmail.com')->send(new \App\Mail\Test());;
	}
}
