<?php

use App\Http\Controllers\Backend\Auth\LoginController;
use App\Http\Controllers\Backend\Auth\LogoutController;
use App\Http\Controllers\Backend\DashboardController;

use Illuminate\Support\Facades\Route;


Route::group(['prefix' => 'adminpanel'], function () {
    // auth route start
    Route::get('/', [LoginController::class, 'LoginPage'])->name('login.index');
    Route::post('/login-check', [LoginController::class, 'loginCheck'])->name('login.check');
    Route::get('/log-out', [LogoutController::class, 'LogOut'])->name('logout');
    // auth route end    
});

  

Route::group(['prefix' =>'/{guard?}dashboard', 'middleware' => ['jwt']],function(){
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');


    //user module routes start
    Route::group(['prefix' => 'custom_module'], function () {
        require_once 'air_ticket_module/city.php';
        require_once 'air_ticket_module/airport.php';
        require_once 'air_ticket_module/flight.php';
    });
    //user module routes end


    //user module routes start
    Route::group(['prefix' => 'hotel-module'], function () {
        require_once 'hotel_module/hotel.php';
    });
    //user module routes end



});