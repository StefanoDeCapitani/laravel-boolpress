<?php

use App\Http\Controllers\Guest\ContactController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Post;
use App\Http\Resources\PostResource;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return response()->json($request->user());
});

Route::middleware('api')->namespace("Guest")->name("guest.")->prefix("guest")->group(function(){
    Route::resource("/posts", "PostController"); 
    Route::resource("/categories", "CategoryController");
    Route::resource("/tags", "TagController");
    Route::post("/contact/send", "ContactController@send")->name("contact.send");
});
