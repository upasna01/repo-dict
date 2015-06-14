<?php

//login page
Route::get('/', function()
{
	return View::make('users.login');
});

//user is being logged in
Route::post('login','LoginController@user');

//function to call user
Route::post('users/getdiszone', 'UsersController@getDisZone');
Route::resource('users','UsersController');

//logout user
Route::get('logout',function()
{
    Session::flush();
    return Redirect::to('/');
});
//Route::get('district',function()
//{
//    return View::make('users.district');
//});

//home
Route::resource('home','HomeController@welcome');

//for users profile
Route::resource('profile','ProfileController');

//programs
Route::resource('program','ProgramController');

//Units
Route::resource('unit','UnitController');

//Product
Route::resource('product','ProductController');

//Region
Route::resource('region','RegionController');

//District
Route::resource('district','DistrictController');

//Zone
Route::resource('zone','ZoneController');



