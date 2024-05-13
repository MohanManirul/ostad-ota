<?php

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;
 

Route::get('/clear', function () {
    Artisan::call('optimize:clear');
    Artisan::call('config:cache');
    Artisan::call('route:clear');
    return 'success';
});



/*
|----------------------------------------------
| Backend Routes Start
|----------------------------------------------
*/
require_once 'backend/web.php';
/*
|----------------------------------------------
| Backend Routes End
|----------------------------------------------
*/


/*
|----------------------------------------------
| Backend Routes Start
|----------------------------------------------
*/
require_once 'frontend/web.php';
/*
|----------------------------------------------
| Backend Routes End
|----------------------------------------------
*/
