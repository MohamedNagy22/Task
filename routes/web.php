<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
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

Route::controller(UserController::class)->group(function(){

            // Register
        Route::get('/register','RegisterForm');
        Route::post('/register','register');
            // login
        Route::get('/login','LoginForm');
        Route::post('/login','login')->name('login');
            // logout
        Route::post('/logout','logout');
        
        Route::middleware("IsUser","auth")->group(function(){
            // User panel interface
        Route::get('/user','userPanel');
            // User select product key
        Route::post('user_add_product','userAddProduct');
            // User's Product Key
        Route::get('/user/product','user_product');
        });  
    });



Route::controller(AdminController::class)->group(function(){
    Route::middleware("IsAdmin","auth")->group(function(){
        //Admin Panel
        Route::get('/admin','adminPanel');    
        //Add product key        
        Route::post('/add_product_key','add_product_key');
        //Fetch All product key
        Route::get('admin/product_keys','show_product_keys');
        Route::post('/admin/product_keys','show_all_product_key');
        //Check expiration of product key
        Route::get('/admin/product_key/{product_key?}','check_expiration');
        });
    });



    //admin account 
        //username = nagy@yahoo.com
        //password = 123

    //user account
        //username =mohamed@yahoo.com  
        //password =123





