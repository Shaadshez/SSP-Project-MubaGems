<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;

use App\Http\Controllers\AdminController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {

    Route::get('/dashboard', function () {
        return redirect()->route('homepage');
    })->name('dashboard');

    Route::get('/dashboards', function () {
        return view('dashboard');
    })->name('dashboards');

    Route::get('/about', function () {
        return view('about.about');
    });

    Route::get('/contact', function () {
        return view('contactus.contactus');
    });

//
//    Route::get('/products', function () {
//        return view('ourproducts.ourproducts');
//    })->name('products');


});

Route::get('/products',[HomeController::class,'product']);

//route::get('/redirect',[HomeController::class,'redirect']);

Route::get('/',[HomeController::class,'index'])->name('homepage');

Route::get('/product',[AdminController::class,'product']);

Route::post('/uploadproduct',[AdminController::class,'uploadproduct']);

Route::get('/showproduct',[AdminController::class,'showproduct']);

Route::get('/deleteproduct/{id}',[AdminController::class,'deleteproduct']);

Route::get('/updateview/{id}',[AdminController::class,'updateview']);

Route::post('/updateproduct/{id}',[AdminController::class,'updateproduct']);

Route::get('/search',[HomeController::class,'search']);

Route::post('/addcart/{id}',[HomeController::class,'addcart']);

Route::get('/showorder',[AdminController::class,'showorder']);

Route::get('/showcart',[HomeController::class,'showcart']);

Route::get('/delete/{id}',[HomeController::class,'deletecart']);

Route::post('/order',[HomeController::class,'confirmorder']);

Route::get('/updatestatus/{id}',[AdminController::class,'updatestatus']);

Route::get('/showusers',[AdminController::class,'showusers']);

Route::get('/manageuser/{id}',[AdminController::class,'manageuser']);

Route::get('/deleteuser/{id}',[AdminController::class,'deleteuser']);


Route::get('/analytics',[AdminController::class,'analytics']);















