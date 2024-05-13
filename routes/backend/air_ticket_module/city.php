<?php

use App\Http\Controllers\Backend\AirTicketModule\CityController;
use Illuminate\Support\Facades\Route;
 
//route start 
Route::controller(CityController::class)->prefix('/cities')->group(function(){

        //index
        Route::get('/', 'index')->name('city.index');
        Route::get('/data', 'data')->name('city.data');

    });
//route end
 