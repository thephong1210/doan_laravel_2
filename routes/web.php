<?php

use Illuminate\Support\Facades\Route;

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

Route::get('fetch-all-data', function () {
    header('Access-Control-Allow-Origin: *');
    $products = \App\Product::all();

    return response()->json($products);
});
Route::get('/list_categories', function () {
    header('Access-Control-Allow-Origin: *');
    $listCategories = \App\Category::all();

    return response()->json($listCategories);
});
Route::get('/search/{category_id}/{product_name}','CategoryController@search');



Route::get('/shop', function () {
     return view('public.shop');
 })->name('shop');

Route::get('/',"FrontendController@index")->name('home');


Route::group(['middleware' => ['auth']], function(){
    Route::prefix('product')->group( function () {
        Route::name('product.')->group( function () {
            Route::get('/', 'ProductController@index')->name('index');
            Route::get('/edit/{id}', 'ProductController@edit')->name('edit');
            Route::put('/update/{id}', 'ProductController@update')->name('update');
            Route::get('/delete/{id}', 'ProductController@destroy')->name('destroy');
            Route::post('/create', 'ProductController@store')->name('store');
            Route::get('/create', 'ProductController@create')->name('create');
        });
    });

    Route::prefix('category')->group( function () {
        Route::name('category.')->group( function () {
            Route::get('/', 'CategoryController@index')->name('index');
            Route::get('/edit/{id}', 'CategoryController@edit')->name('edit');
            Route::put('/update/{id}', 'CategoryController@update')->name('update');
            Route::get('/delete/{id}', 'CategoryController@destroy')->name('destroy');
            Route::post('/create', 'CategoryController@store')->name('store');
            Route::get('/create', 'CategoryController@create')->name('create');
        });
    });
    Route::prefix('management_order')->group( function () {
        Route::name('management_order.')->group( function () {
            Route::get('/', 'ManagementOrder@index')->name('index');
            Route::get('/product_order/{id}', 'ManagementOrder@OrderProducts')->name('products');
        });
    });

});

Route::get('category/{id}', 'FrontendController@category')->name('category');
Route::get('product/detail/{id}', 'FrontendController@productDetail')->name('product.detail');
Route::get('add-to-cart/{id}', 'FrontendController@addToCart')->name('add-to-cart');
Route::post('order_detail', 'FrontendController@orderDetail')->name('order_detail');

Route::get('destroy/{id}', 'FrontendController@removeCart')->name('remove');



Auth::routes(['/login']);


Route::get('login',"LoginController@index");
Route::post('login',"LoginController@login")->name('login');
