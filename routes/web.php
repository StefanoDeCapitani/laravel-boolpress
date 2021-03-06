<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Auth::routes();

Route::get("/", "HomeController@index")->name("home.index");

Route::middleware("auth")->namespace("Admin")->name('admin.')->prefix("admin")->group(function(){
    Route::resource("posts", "PostController");
    Route::resource("categories", "CategoryController");
});

Route::middleware(["auth", "admin"])->namespace("Admin")->name('admin.')->prefix("admin")->group(function(){
    Route::put("users/{id}/role/update", "RoleController@update")->name("users.role.update");
    Route::resource("users", "UserController");
});


Route::prefix("{any?}")->group(function(){
    Route::get("/{id?}", function(){
        if(Auth::check()){
            return redirect()->route("admin.posts.index");
        }
        return view("guest.index");
    });
});