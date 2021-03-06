<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::middleware('auth:sanctum')->group(function(){
    Route::get('user',function(){
        return auth()->user();
    });
});

Route::post('register', [App\Http\Controllers\AccountController::class, 'register']);
Route::post('login', [App\Http\Controllers\AccountController::class, 'login']);



Route::resource('books', App\Http\Controllers\BookStoreController::class);
Route::get('book-gallery/{book}', [App\Http\Controllers\BookStoreController::class,'updateGallery']);
