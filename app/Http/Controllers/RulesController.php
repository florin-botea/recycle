<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class RulesController extends Controller
{
	public function __construct(){
		$this->middleware('admin', ['except' => ['index']]);
	}
	
	public function index()
	{
		$company = \App\Company::with(['services','rules','services_photos'])->first();
		
		return view('services')
			->with(compact('company'));
	}
	
	public function create ()
	{
		$company = \App\Company::with(['services','rules','services_photos'])->first();
		
		return view('editServices')
			->with(compact('company'));
	}
	
    public function store (Request $request)
	{
		$data = $request->all();
		$data['company_id'] = 1;
		\App\Rule::create($data);
		
		return back();
	}
	
    public function update (Request $request, $id)
	{
		\App\Rule::findOrFail($id)->update($request->all());
		
		return back();
	}
	
    public function destroy ($id)
	{
		\App\Rule::findOrFail($id)->delete();
		
		return back();
	}
}
