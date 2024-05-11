<?php
namespace App\Services;

use App\Models\CourseProject;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;


class CourseProjectsCrudService{
    public function storeCourseProject($course_id, $title, $image, $sequence){    
              
        $img = time() . Str::random(12) . '.' . $image->getClientOriginalExtension();
        $location = public_path('assets/images/' . $img);      
        Image::make($image)->save($location);           
     
        CourseProject::create([
            'course_id' => $course_id,
            'title' => $title,
            'image' =>$img ,
            'sequence' => $sequence
          ]);

    }
   
}


?>