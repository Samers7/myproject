<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
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

Route::get('/', function () {
    return redirect('/login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//product

Route::get('/products',[ProductController::class, 'index']);
Route::view('addProducts', 'addProducts');
Route::post('/addProducts',[ProductController::class, 'create']);
Route::post('/update/product/{id}',[ProductController::class, 'update']);
Route::get('/delete/product/{id}',[ProductController::class, 'destroy']);
Route::get('/show/{id}',[ProductController::class, 'show']);





//user
Route::get('users', function () {
    return view('/users')->with(['users'=>DB::table('users')->get()]);
});
Route::post('role/{id}', [HomeController::class, 'update']);
Route::get('logout', function () {
    Auth::logout();
    return redirect('/');
});
