<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SearchController extends Controller
{
	public function index(Request $request)
	{
		$_news = \App\News::where('title', 'LIKE', '%'.$request->string.'%')
			->orWhere('text', 'LIKE', '%'.$request->string.'%')
			->get();
		$_laws = \App\Law::where('title', 'LIKE', '%'.$request->string.'%')
			->orWhere('text', 'LIKE', '%'.$request->string.'%')
			->get();
		$_services = \App\Service::where('title', 'LIKE', '%'.$request->string.'%')
			->orWhere('text', 'LIKE', '%'.$request->string.'%')
			->get();
		$_rules = \App\Rule::where('title', 'LIKE', '%'.$request->string.'%')
			->orWhere('text', 'LIKE', '%'.$request->string.'%')
			->get();
		
		return view('searchResults')->with(compact('_news','_laws','_services','_rules'));
	}
}
