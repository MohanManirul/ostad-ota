<?php

use App\Http\Controllers\Frontend\HomePageController;
use App\Http\Controllers\Frontend\PolicyController;
use Illuminate\Support\Facades\Route;





Route::controller(HomePageController::class)->prefix('/')->group(function(){
 
    //index
    Route::get('/',  'landingPage')->name('landing.page');        
 
   

});


    //course module routes start
    Route::group(['prefix' => 'student'], function () {
        require_once 'students/auth.php';
    });
    //course module routes end

    