<?php

use App\Http\Controllers\Backend\AirTicketModule\AirportController;
use Illuminate\Support\Facades\Route;
 
//route start 
Route::controller(AirportController::class)->prefix('/airports')->group(function(){

        //index
        Route::get('/', 'index')->name('airport.index');
        Route::get('/data', 'data')->name('airport.data');
 

    });
//route end
