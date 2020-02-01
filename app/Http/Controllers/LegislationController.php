<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LegislationController extends Controller
{
	
	public function __construct(){
		$this->middleware('admin', ['except' => ['index']]);
	}
	
	public function index()
	{
		$photos = \App\Gallery::all();
		$laws = [];//\App\Law::all();
		
		return view('legislation')
			->with(compact('photos', 'laws'));
	}
	
	public function create ()
	{
		$laws = \App\Law::all();
		
		return view('editLegislation')
			->with(compact('laws'));
	}
	
    public function store(Request $request)
	{
		\App\Law::create($request->all());
		
		return back();
	}
	
	public function update(Request $request, $id)
	{
		\App\Law::findOrFail($id)->update($request->all());
		
		return back();
	}
	
	public function destroy($id)
	{
		\App\Law::findOrFail($id)->delete();
		
		return back();
	}
}
