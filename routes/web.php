<?php

use Illuminate\Support\Facades\Route;




// route user
Route::get('/', 'HalamanUserController@index');


// route admin
Route::get('/login', 'LoginController@index')->middleware('guest')->name('login');
Route::post('/login', 'LoginController@authenticate');

Route::get('/dashboard', function() {
    return view('dashboard.index', [
        'title' => 'Dashboard'
    ]);
})->name('dashboard')->middleware('auth');

Route::post('/logout', 'LoginController@logout');



Route::get('/dashboard/category/cetak_pdf', 'PDFController@cetak_pdf');


Route::resource('/dashboard/category', 'CategoryController')->middleware('auth');
Route::resource('/dashboard/product', 'ProductController')->middleware('auth');




Route::resource('/resource', 'ResourceController');
