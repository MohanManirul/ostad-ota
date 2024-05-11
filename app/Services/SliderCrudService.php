<?php
namespace App\Services;


use App\Models\Slider;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;


class SliderCrudService{
    public function storeSlider($title, $sub_title,$image,$sequence){
    
              
        $img = time() . Str::random(12) . '.' . $image->getClientOriginalExtension();
        $location = public_path('assets/images/' . $img);      
        Image::make($image)->save($location);           
     
        Slider::create([
            'title' => $title,
            'sub_title' => $sub_title,
            'image' =>$img ,
            'sequence' => $sequence,
          ]);

    }
   
}


?>