<?php
namespace App\Services;

use App\Models\EquipmentsForCourse;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;


class CourseEquipmentsCrudService{
   
    public function storeCourseEquipment( $title, $image,  $sequence){   

        $img = time() . Str::random(12) . '.' . $image->getClientOriginalExtension();
        $location = public_path('assets/images/' . $img);      
        Image::make($image)->save($location); 

        EquipmentsForCourse::create([
            'title' => $title,
            'sequence' => $sequence,
            'image' => $img
          ]);        

    }



    
   
}


?>