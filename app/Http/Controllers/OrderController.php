<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use App\Mail\Order;
use App\Mail\MessageSent;
use App\Http\Validations\ValidOrder;
use Illuminate\Support\MessageBag;

class OrderController extends Controller
{
    public function create ()
	{
		$company = \App\Company::with(['services','rules','services_photos'])->first();
		
		return view('addOrder')
			->with(compact('company'));
	}
	
	public function store (ValidOrder $request, MessageBag $mb)
	{
		$photos_size = 0;
		foreach (($request->file('photos')??[]) as $photo){
			$photos_size += $photo->getSize();
		}
		if ($photos_size > (10*1024*1024)){
			$mb->add('photos[]', 'Maxim 10MB');
			return back()->withErrors($mb)->withInput($request->all());
		}
		if ($request->time && strtotime($request->time) < strtotime("now")){
			$mb->add('time', 'Selectati o data valida');
			return back()->withErrors($mb)->withInput($request->all());
		}

		Mail::to('florinbotea777@gmail.com')->send(new Order());
		Mail::to('florinbotea777@gmail.com')->send(new MessageSent());
		
		return back();
	}
}
