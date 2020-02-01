<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MyClasses\Carousel;
use App\MyClasses\Company;
use App\MyClasses\News;
use Storage;

class HomepageController extends Controller
{
    public function index(){
		$carousel = \App\Gallery::where('gallery', 'carousel')->get();

		return view('homepage')
			->with(compact('carousel'));
	}
}
