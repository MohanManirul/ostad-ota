<?php

namespace App\Http\Controllers\Frontend;

use App\Helper\ResponseHelper;
use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\AppSetting;
use App\Models\Portfolio;
use App\Models\Service;
use App\Models\Slider;
use App\Models\Team;
use App\Models\WebHosting;
use Exception;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\JsonResponse;

class HomePageController extends Controller
{
     
    protected $folderPath;
    public function __construct()
    {
        $this->folderPath = 'frontend.pages.';
    }


    //landing page
    public function landingPage():View
    {
        return view($this->folderPath.'landing-page');
    }

    public function index(){
        return view('frontend.index.pages.home');
    }
     public function flightList(){
        return view('frontend.index.pages.flight_list');
    }
}