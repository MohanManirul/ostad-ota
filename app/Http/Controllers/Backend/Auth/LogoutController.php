<?php

namespace App\Http\Controllers\Backend\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LogoutController extends Controller
{
    //LogOut
    public function LogOut(){
        return redirect('adminpanel')->cookie('token','',-1);
    }

}
