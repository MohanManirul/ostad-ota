<?php

namespace App\Http\Controllers\Backend;

use App\Helper\ResponseHelper;
use App\Http\Controllers\Controller;
use App\Models\AppSetting;
use App\Services\AppSettingsCrudService;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\View\View;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;


class AppSettingController extends Controller
{
    protected $folderPath;
    protected $appSettingsCrudService;
    public function __construct(AppSettingsCrudService $appSettingsCrudService)
    {
        $this->folderPath = 'backend.pages.';
        $this->appSettingsCrudService = $appSettingsCrudService ;
    }


    //appSettingsPage
    public function appSettingsPage():View{
        if(can('view_app_setting') || request()->header('role') == 'superadmin'){
            return view($this->folderPath.'appSettings-page');
        }else{
            return view('errors.404');
        }
    }

    //ServiceListPage
    public function appSettingsData():JsonResponse{
        if(can('view_app_setting') || request()->header('role') == 'superadmin'){
            try{
                $data= AppSetting::select('id','logo','fav_icon','location','email','mobile','twitter','facebook','instagram','linkedin')->first();
                return ResponseHelper::Out('success',$data,200);
            }catch(Exception $e){
                return ResponseHelper::Out('fail',$e,200);
            }
        }else{
            return view('errors.404');
        }
    }

    
    
    //appSettingsUpdate
    public function appSettingsUpdate(Request $request){

        if(can('edit_app_setting') || request()->header('role') == 'superadmin'){
            try{
           
                $appSettings = AppSetting::findOrFail($request->input('id'));
              
                $appSettings->location = $request->location;
                $appSettings->email = $request->email;
                $appSettings->mobile = $request->mobile;
                $appSettings->facebook = $request->facebook;
                $appSettings->twitter = $request->twitter;
                $appSettings->instagram = $request->instagram;
                $appSettings->linkedin = $request->linkedin;
                
                // logo insert 
                if ($request->logo) { 

                    //delete that image
                    if (File::exists('assets/images/' . $appSettings->logo)) {
                        File::delete('assets/images/' . $appSettings->logo);
                    }
                    $logo = $request->file('logo');
                    $img = time() . Str::random(12) . '.' . $logo->getClientOriginalExtension();
                    $location = public_path('assets/images/' . $img);
                    Image::make($logo)->save($location);
                    $appSettings->logo = $img;
                }
                // fav_icon insert 
                if ($request->fav_icon) { 

                    //delete that image
                    if (File::exists('assets/images/' . $appSettings->fav_icon)) {
                        File::delete('assets/images/' . $appSettings->fav_icon);
                    }
                    $fav_icon = $request->file('fav_icon');
                    $img = time() . Str::random(12) . '.' . $fav_icon->getClientOriginalExtension();
                    $location = public_path('assets/images/' . $img);
                    Image::make($fav_icon)->save($location);
                    $appSettings->fav_icon = $img;
                }
                if($appSettings->save()){
                    return ResponseHelper::Out('success',"",200);
                }
            
            }catch(Exception $e){
                return ResponseHelper::Out('fail',$e,200);
            }  
        }else{
            return view('errors.404');
        }
         

    }






}

