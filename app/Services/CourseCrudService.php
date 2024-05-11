<?php
namespace App\Services;

use App\Models\Course;
use App\Models\Mentor;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;


class CourseCrudService{
    public function storeCourse($name, $batch_no, $descriptions, $image, $total_seat, $booked_seat, $class_start_date, $class_end_date, $class_start_time,$fee,$total_ratings,$average_ratings,$demo_class_video,$category_id,$mentor_id,$sequence ){    
              
        $img = time() . Str::random(12) . '.' . $image->getClientOriginalExtension();
        $location = public_path('assets/images/' . $img);      
        Image::make($image)->save($location); 

       
        Course::create([
            'name' => $name,
            'batch_no' => $batch_no,
            'descriptions' => $descriptions,
            'total_seat' => $total_seat,
            'booked_seat' => $booked_seat,
            'class_start_date' => $class_start_date,
            'class_end_date' => $class_end_date,
            'class_start_time' => $class_start_time,
            'fee' => $fee,
            'total_ratings' => $total_ratings,
            'average_ratings' => $average_ratings,
            'demo_class_video' => $demo_class_video,
            'category_id' => $category_id,
            'mentor_id' => $mentor_id,
            'image' =>$img ,
            'sequence' => $sequence
          ]);

    }
   
}


?>