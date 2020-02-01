<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ServicesController extends Controller
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
		\App\Service::create($data);
		
		return back();
	}
	
    public function update (Request $request, $id)
	{
		\App\Service::findOrFail($id)->update($request->all());
		
		return back();
	}
	
    public function updatePhotos (Request $request)
	{
		foreach ($request->file('photos')??[] as $photo) {
			$name = Storage::disk('public')->putFile('gallery', $photo);
			\App\Gallery::create([
				'company_id'=>1, 
				'gallery'=>'services',
				'name' => $name
			]);
		}
		if (! $request->deleted_photos ){
			return back();
		}
		foreach ($request->deleted_photos as $photo) {
			$photo = \App\Gallery::find($photo);
			Storage::delete('public/gallery/'.$photo->name);
			$photo->delete();
		}
		return back();
	}
	
    public function destroy ($id)
	{
		\App\Service::findOrFail($id)->delete();
		
		return back();
	}
}
