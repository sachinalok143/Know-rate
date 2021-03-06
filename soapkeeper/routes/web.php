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



Route::post('/update-profile-pic','ProfileController@updateProfilePic');
Route::post('/update-cover-pic','ProfileController@updateCoverPic');
Route::post('/update-profile','ProfileController@updateProfile');
Route::get('/get-items-by-saopkeeper','itemController@getItemBySaopkeeper');
Route::get('/get-item-by-category/{categoryId}','itemController@getItemByCategory');
Route::post('/add-item-by-shopkeeper','itemController@addItemByShopkeeper');
Route::post('/edit-item-by-shopkeeper','itemController@editItemByShopkeeper');
Route::get('/delete-item/{id}','itemController@deleteItemById');
Route::post('/reset-password/{id}','ProfileController@resetPassword');
Route::post('/add-image','itemController@addImage');




Route::get('/', function () {
	if(!Auth::user()){
    return view('auth.login');
	}
	else
	{
		return view('home');
	}

});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/profile',function(){
	if(Auth::user()){
	return view('auth.profile');
	}
	else{
		return view('auth.login'); 
	}
});


Route::get('/FAQs',function(){
	return view('otherView.FAQ');
});


Route::get('/Home',function(){
	return view('otherView.home');
});
Route::get('/aboutUs',function(){
	return view('otherView.aboutUs');
});

Route::get('/Term&Conditions',function(){
	return view('otherView.Term&conditions');
});
