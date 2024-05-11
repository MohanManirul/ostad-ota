<?php

namespace App\Http\Controllers\Frontend;

use App\Helper\ResponseHelper;
use App\Http\Controllers\Controller;
use App\Models\Student;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Session;

class StudentDashboardController extends Controller
{
   

   
    //index
    public function index():View
    {
        return view('frontend.dashboard.dashboard-page');
    }

    //profile
    public function profile():View
    {
        return view('frontend.dashboard.profile-page');
    }

    //LogOut
    public function LogOut(){
        return redirect('/student/login')->cookie('student-token','',-1);
    }


     //profileData
     public function profileData(Request $request):JsonResponse
     {
         
         try{
            $student_id=$request->header('id');
            $data=Student::where('id',$student_id)->first();
            return ResponseHelper::Out('success',$data,200);
         }catch(Exception $e){
             return ResponseHelper::Out('fail',$e,200);
         }
     }

     //profileUpdate
     public function profileUpdate(Request $request)
     {
      
         try{          
            $Student = Student::findOrFail($request->header('id')); 
            $Student->phone = $request->input('phone');          
            $Student->name = $request->input('name'); 

            // image insert 
            if ($request->image) { 

                //delete that image
                if (File::exists('frontend/assets/static_images' . $Student->image)) {
                    File::delete('frontend/assets/static_images' . $Student->image);
                }
                $image = $request->file('image');
                $img = time() . Str::random(12) . '.' . $image->getClientOriginalExtension();
                $location = public_path('frontend/assets/static_images/' . $img);
                Image::make($image)->save($location);
                $Student->image = $img;
            }

            if($Student->save()){
                return ResponseHelper::Out('success',"",200);
            }
         }catch(Exception $e){
             return ResponseHelper::Out('fail',$e->getMessage(),200);
         }

     }



}
