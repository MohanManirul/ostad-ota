<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\JobModule\Category;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DashboardController extends Controller
{
    //index

    public function index():View
    {
        return view('backend.pages.dashboard.dashboard-page');
    }


}
