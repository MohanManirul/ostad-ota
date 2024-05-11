<?php
namespace App\Services;

use App\Models\CourseSumary;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;


class CourseSumaryCrudService{
    public function storeCourseSumary($course_id,$title, $sub_title, $image,$sequence){    
              
        $img = time() . Str::random(12) . '.' . $image->getClientOriginalExtension();
        $location = public_path('assets/images/' . $img);      
        Image::make($image)->save($location);           
     
        CourseSumary::create([
            'course_id' => $course_id,
            'title' => $title,
            'sub_title' => $sub_title,
            'image' =>$img ,
            'sequence' => $sequence
          ]);

    }
   
}


?>