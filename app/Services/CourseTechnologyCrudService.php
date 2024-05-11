<?php
namespace App\Services;

use App\Models\CourseTechnology;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;


class CourseTechnologyCrudService{
    public function storeCourseTechnology($name, $image, $sequence){    
              
        $img = time() . Str::random(12) . '.' . $image->getClientOriginalExtension();
        $location = public_path('assets/images/' . $img);      
        Image::make($image)->save($location);           
     
        CourseTechnology::create([
            'name' => $name,
            'image' =>$img ,
            'sequence' => $sequence
          ]);

    }
   
}


?>