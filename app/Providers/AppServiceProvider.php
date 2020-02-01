<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
		Blade::if('admin', function () {
			return request()->session()->get('admin', false);
		});
		
		Blade::component('components.forms.formGroup', 'formGroup');
		Blade::component('components.forms.form', 'form');
		Blade::component('components.forms.formSubmit', 'formSubmit');
		Blade::component('components.forms.formGallery', 'formGallery');
		Blade::component('components.gallery', 'gallery');
		
		
		$company = \App\Company::first() ?? \App\Company::create(['name' => 'my company']);
		$news = \App\News::all();
		View::share(compact('company', 'news'));
		// if (DB::connection() instanceof \Illuminate\Database\SQLiteConnection) {
			// DB::statement(DB::raw('PRAGMA foreign_keys=1'));
		// }
    }
}
