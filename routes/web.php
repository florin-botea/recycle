<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'HomepageController@index');

Route::resource('carousel', 'CarouselController')->only(['create', 'store']);
Route::resource('company', 'CompanyController')->only(['create', 'store', 'index']);
Route::resource('services', 'ServicesController');
Route::post('/services-photos/update', 'ServicesController@updatePhotos');
Route::resource('rules', 'RulesController');
Route::resource('orders', 'OrderController');
Route::resource('news', 'NewsController');
Route::resource('contact-us', 'ContactController');
Route::resource('legislation', 'LegislationController');

Route::get('/test', 'DevController@test');

Route::get('/search', 'SearchController@index');

Route::get('/admin-login', 'LoginController@index');
Route::post('/login', 'LoginController@login');
Route::get('/logout', 'LoginController@logout');








Route::get('/edit-carousel', 'HomepageController@editCarousel');
Route::post('/update-carousel', 'HomepageController@updateCarousel');
Route::post('/delete-carousel', 'HomepageController@deleteCarousel');

Route::get('/edit-company', 'AboutUsController@editCompany');
Route::post('/update-company', 'AboutUsController@updateCompany');

Route::get('/edit-news', 'NewsController@edit');
Route::post('/create-news', 'NewsController@createNews');
Route::post('/update-news/{id}', 'NewsController@updateNews');
Route::post('/delete-news/{id}', 'NewsController@deleteNews');

Route::get('/about-us', 'AboutUsController@index');
Route::get('/edit-bio', 'AboutUsController@editBio');
Route::post('/update-bio', 'AboutUsController@updateBio');

Route::get('/contact', 'ContactController@index');
Route::post('/create-message', 'ContactController@createMessage');

Route::get('/services-and-activity', 'ServicesController@index');
Route::get('/edit-services', 'ServicesController@editServices');
Route::post('/update-services', 'ServicesController@updateServices');

Route::get('/add-order', 'OrderController@index');