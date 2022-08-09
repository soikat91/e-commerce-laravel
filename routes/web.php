<?php

use App\Http\Controllers\loginController;
use App\Http\Controllers\productController;
use Database\Seeders\ProductSeeder;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

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
Route::get('/',[productController::class,'index']);
Route::get('/login', function () {
    return view('login');
});
Route::get('/logout', function () {

    Session::forget('user');
    return redirect('login');
});
Route::view('/registration','registration');
Route::post('/registration',[loginController::class,'register']);
Route::post('/login',[loginController::class,'login']);
Route::get('details/{id}',[productController::class,'details']);
Route::post('/add_to_cart',[productController::class,'addToCart']);
Route::get('/cartlist',[productController::class,'cartList']);
Route::get('/remove/{id}',[productController::class,'cartRemove']);
Route::get('/ordernow',[productController::class,'orderNow']);
Route::post('order',[productController::class,'order']);
Route::get('/myorder',[productController::class,'myOrder']);

