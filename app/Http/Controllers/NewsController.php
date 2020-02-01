<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
	public function __construct(){
		$this->middleware('admin', ['except' => ['index']]);
	}
	
	public function create ()
	{
		return view('editNews');
	}
	
    public function store(Request $request)
	{
		$name = Storage::disk('public')->putFile('gallery', $request->photo);
		$data = $request->all();
		$data['photo'] = $name;
		$data['company_id'] = 1;
		$news = \App\News::create($data);
		
		return back();
	}
	
	public function update(Request $request, $id)
	{
		$data = $request->all();
		$news = \App\News::findOrFail($id);
		if ($request->file('photo')){
			Storage::delete('public/gallery/'.$news->photo);
			$photo = Storage::disk('public')->putFile('gallery', $request->file('photo'));
			$data['photo'] = $photo;
		}
		$news->update( $data );
		
		return back();
	}
	
	public function destroy($id)
	{
		\App\News::findOrFail($id)->delete();
		File::delete(public_path().'/storage/news/'.$id.'.jpg');
		
		return back();
	}
}
