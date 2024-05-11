<?php

use App\Http\Controllers\Frontend\StudentAuthController;
use App\Http\Controllers\Frontend\StudentDashboardController;
use Illuminate\Support\Facades\Route;

Route::controller(StudentAuthController::class)->prefix('/')->group(function(){
    //index
    Route::get('/Registration',  'RegistrationPage')->name('RegistrationPage');  
    Route::post('/registration',  'Registration')->name('Registration');  

    Route::get('/login',  'loginPage')->name('loginPage');  
    Route::post('/do-login',  'doLogin')->name('doLogin');  

}); 


Route::group(['prefix' =>'/dashboard', 'middleware' => ['student-jwt']],function(){

    Route::controller(StudentDashboardController::class)->group(function(){
 
        //index
        Route::get('/',  'index')->name('index');        

        Route::get('/log-out','LogOut')->name('student.logout');

        //profile
        Route::get('/profile','profile')->name('student.profile');

        //profile
        Route::get('/profile-data','profileData')->name('student.profile.data');
        
        //profile-update
        Route::post('profile-update','profileUpdate')->name('student.profile.update');
       
       });

    
});