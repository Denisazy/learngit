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



// Route::get('blog', 'BlogController@index');
//Route::get('blog/{slug}', 'BlogController@show');




Route::get('search', function () {
     return view('panel.search');
 })->name('search');

//Route::get('/', 'BlogController@index');
Auth::routes();




Route::get('test', function () {
     return view('test');
 });


Route::get('editbook', function () {
     return view('panel.editbook');
 })->name('editbook');
// Route::get('/home', 'HomeController@index')->name('home');

// Route::get('/', function() {

//         return View('index',['website' => 'skdjfksdjfksjd']);

//     });





Route::get('/', function () {
     return view('public.welcome');
 });
// Route::group(['middleware' => 'auth', 'namespace' => 'Admin', 'prefix' => 'admin'], function() {
//     Route::get('home', function () {
//      return view('home');
//  });
// });

Route::group(['middleware' => 'auth'], function() {
	Route::get('allbook', 'BookController@index')->name('allbook');
	Route::get('blog', 'BlogController@store')->name('blog');
	Route::get('addbook', function () {
	 	return view('panel.addbook');
	})->name('addbook');

	Route::get('book/borrow', function () {
	 	return view('panel.borrowbook');
	})->name('book/borrow');

	Route::get('borrow/history', 'BorrowController@index')->name('borrow/history');
	Route::get('borrowdata', 'BorrowController@borrowdata')->name('borrowdata');

	Route::post('book/borrowing', 'BorrowController@store')->name('book/borrowing');
	Route::put('book/return', 'BorrowController@update')->name('book/return');

	Route::post('book/store','BookController@store');
	Route::post('booksearch','BookController@search')->name('booksearch');

	Route::get('book/edit/{book_id}','BookController@edit')->name('book/edit');
	Route::put('book/update/{book_id}','BookController@update')->name('book/update');

	Route::get('book/delete/{book_id}','BookController@destroy')->name('book/delete');

	Route::get('book/show/{book_id}','BookController@show')->name('book/show');

	Route::get('datatables', 'BookController@getIndex')->name('datatables');
	Route::get('datatablesdetail', 'BookController@anyData')->name('datatablesdetail');

	Route::get('home', function () {
	 return view('panel.home');
	})->name('home');
});