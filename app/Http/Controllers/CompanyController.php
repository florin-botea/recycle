<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class CompanyController extends Controller
{

	public function __construct(){
		$this->middleware('admin', ['except' => ['index']]);
	}

	public function index ()
	{
		$company = \App\Company::with('photos')->first();
		return view('aboutUs')
			->with(compact('company'));
	}

    public function create()
    {
		return view('editCompany');
    }

    public function store(Request $request)
    {
		\App\Company::first()->update($request->all());
		if ($request->file('logo')) {
			$request->file('logo')->move('logo', 'logo.jpg');
		}
		foreach ($request->file('photos')??[] as $photo) {
			$name = Storage::disk('public')->putFile('gallery', $photo);
			\App\Gallery::create([
				'company_id'=>1, 
				'gallery'=>'company',
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
}
