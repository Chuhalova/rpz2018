<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();
Route::get('/', 'HomeAdvertisementController@index')->name('home');
Route::get('/home', 'HomeAdvertisementController@index')->name('home');
Route::get('/filtrate', 'HomeAdvertisementController@filtrate')->name('filtrate');
Route::get('/show/{id}','AdvertisementController@showForAll');
Route::get('/categories', function(\Illuminate\Http\Request $request) {
    return response()->json(\App\Category::whereParentId(null)->get());
});

Route::get('/categories/{parent}', function(\Illuminate\Http\Request $request, \App\Category $parent) {
    return response()->json(\App\Category::whereParentId($parent->id)->get());
});
Route::get('/advertisements/activeUserAdv', 'AdvertisementController@indexActive')->middleware('roles:User');
Route::get('/advertisements/inactiveUserAdv', 'AdvertisementController@indexInactive')->middleware('roles:User');
Route::get('advertisements', 'AdvertisementController@index');
Route::get('advertisements/create', 'AdvertisementController@create')->middleware('roles:User');
Route::post('advertisements', 'AdvertisementController@store')->middleware('roles:User');
Route::get('advertisements/{id}/edit', 'AdvertisementController@edit')->middleware('roles:User');
Route::patch('/advertisements/{id}', 'AdvertisementController@update')->middleware('roles:User');
Route::delete('/advimages/{id}', 'AdvertisementController@destroyImage')->middleware('roles:User');
Route::patch('/adv/{id}', 'AdvertisementController@updateOnImg')->middleware('roles:User');
Route::get('/showForUser/{id}','AdvertisementController@showForUser')->middleware('roles:User');
Route::get('/admin_advertisement/active', 'AdminAdvertisementController@indexActive')->middleware('roles:Moderator')->name('admin_advertisement_active');
Route::get('/admin_advertisement/inactive', 'AdminAdvertisementController@indexInactive')->middleware('roles:Moderator')->name('admin_advertisement_inactive');
Route::patch('/admin_advertisement/inactive/{id}', 'AdminAdvertisementController@makeActive')->middleware('roles:Moderator');
Route::delete('/admin_advertisement/inactive/{id}', 'AdminAdvertisementController@destroyAdv')->middleware('roles:Moderator');
Route::delete('/advertisements/{id}', 'AdvertisementController@destroyAdv')->middleware('roles:User');
Route::delete('/admin_advertisement/active/{id}', 'AdminAdvertisementController@destroyAdv')->middleware('roles:Moderator');