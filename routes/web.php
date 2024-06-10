<?php

use Illuminate\Support\Facades\Route;




// route user
Route::get('/', 'HalamanUserController@index');
Route::get('/product/detail/{id}', 'HalamanUserController@productDetail');


// route admin
Route::get('/login', 'LoginController@index')->middleware('guest')->name('login');
Route::get('/register', 'LoginController@showRegisterForm')->middleware('guest');
Route::post('/register', 'LoginController@register')->middleware('guest');
Route::post('/login', 'LoginController@authenticate');

Route::get('/dashboard', function() {
    return view('dashboard.index', [
        'title' => 'Dashboard'
    ]);
})->name('dashboard')->middleware(['auth', 'checkAdmin']);




Route::post('/logout', 'LoginController@logout');





Route::resource('/dashboard/category', 'CategoryController')->middleware('auth');
Route::post('/dashboard/category/{category}/copy', 'CategoryController@copy')->name('category.copy');
Route::delete('/dashboard/category/bulk-delete', 'CategoryController@bulkDelete')->name('category.bulkDelete');


Route::resource('/dashboard/product', 'ProductController')->middleware('auth');
Route::post('/dashboard/product/{product}/copy', 'ProductController@copy')->name('product.copy');




Route::resource('/resource', 'ResourceController');



// pdf
Route::get('/dashboard/pdfcategory', 'PDFController@cetak_pdf_category');

Route::get('/dashboard/pdfproduct', 'PDFController@cetak_pdf_product');







// cart
Route::post('/product/cart/{id}', 'CartController@addToCart')->name('cart.add');
Route::get('/cart', 'CartController@index')->middleware('auth');;







