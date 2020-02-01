<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class CarouselController extends Controller
{

	public function __construct(){
		$this->middleware('admin', ['except' => ['index']]);
	}

    public function create()
    {
		$company = \App\Company::first() ?? \App\Company::create(['name' => 'my company']);
		$carousel = \App\Gallery::where('gallery', 'carousel')->get();
		return view('editCarousel')
			->with(compact('carousel','company'));
    }

    public function store(Request $request)
    {
		//dd(Storage::putFile('avatars', $request->file('photos')[0]));
		foreach ($request->file('photos')??[] as $photo) {
			$name = Storage::disk('public')->putFile('gallery', $photo);
			\App\Gallery::create([
				'company_id'=>1, 
				'gallery'=>'carousel',
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
