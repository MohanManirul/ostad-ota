<?php

use App\Http\Controllers\Backend\AirTicketModule\FlightController;
use Illuminate\Support\Facades\Route;
 
//route start 
Route::controller(FlightController::class)->prefix('/flights')->group(function(){

        //index
        Route::get('/', 'index')->name('flight.index');
       
        //all-data
        Route::get('/data', 'data')->name('flight.data');
       
        //store
        Route::post('/store', 'store')->name('flight.store');

        //edit
        Route::post('/edit', 'edit')->name('flight.edit');

        //update
        Route::post('/update', 'update')->name('flight.update');

        //delete
        Route::post('/delete', 'delete')->name('flight.delete');

    });
//route end
 