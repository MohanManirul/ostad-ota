<?php

use App\Http\Controllers\Backend\Hotel\HotelController;
use Illuminate\Support\Facades\Route;
 
//route start 
Route::controller(HotelController::class)->prefix('/cities')->group(function(){

        //index
        Route::get('/', 'index')->name('hotel.index');
        Route::get('/data', 'data')->name('hotel.data');

    });
//route end
 