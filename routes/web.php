<?php

use App\Http\Controllers\Controlling\Role\RoleController;
use App\Http\Controllers\Controlling\Role\UserController;
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

Auth::routes(['register'=>false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//Route::redirect('/home','controlled/dashboard');

Route::group(['prefix'=>'controlled','middleware'=>['auth','Admin'],'namespace'=>'Controlling'],function(){
    Route::get('/',function (){return view('Admin.main');});
    Route::resource('category','CategoryController');
    Route::resource('product','ProductController');
    Route::resource('filter','FilterController');
    Route::resource('sub_filter','SubFilterController');
});

Route::group(['prefix'=>'role','middleware' => ['auth'],'namespace'=>'Controlling'], function() {
    //Route::get('users/test', function (){return 'test';});
    Route::resource('roles', 'Role\RoleController');
    Route::resource('users', 'Role\UserController');
    Route::get('/logout',function (){
        //$logout = \App\Models\User::findOrFail($id);

        auth()->logout();
        session()->invalidate();
        return redirect()->route('login');
    });

    //Route::resource('products', ProductController::class);
});
