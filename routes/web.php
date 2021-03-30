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

Route::get('/', function () {
    return view('welcome');
});

//Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//    return view('dashboard');
//})->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::resource('dashboard', \App\Http\Controllers\Backend\DashboardController::class)->only([
        'index'
    ]);
    Route::resource('sms',\App\Http\Controllers\Backend\SmsController::class);
    Route::resource('messages',\App\Http\Controllers\Backend\MessagesController::class);

    Route::resource('suppliers',\App\Http\Controllers\Backend\SupplierController::class);
    Route::resource('customers',\App\Http\Controllers\Backend\CustomerController::class);




    Route::resource('users',\App\Http\Controllers\Backend\UserController::class);
    Route::resource('roles',\App\Http\Controllers\Backend\RolesController::class);

    // print route


});


