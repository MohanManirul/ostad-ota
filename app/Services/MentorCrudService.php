<?php
namespace App\Services;

use App\Models\Mentor;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;


class MentorCrudService{
    public function storeMentor($name, $speciality_title, $mobile, $email, $type, $des, $address, $skills, $image,$name_banner_image,$sequence){    
              
        $img = time() . Str::random(12) . '.' . $image->getClientOriginalExtension();
        $location = public_path('assets/images/' . $img);      
        Image::make($image)->save($location); 

        $bannerImg = time() . Str::random(12) . '.' . $name_banner_image->getClientOriginalExtension();
        $location = public_path('assets/images/' . $bannerImg);      
        Image::make($name_banner_image)->save($location);           
     
        Mentor::create([
            'name' => $name,
            'speciality_title' => $speciality_title,
            'mobile' => $mobile,
            'email' => $email,
            'address' => $address,
            'type' => $type,
            'des' => $des,
            'skills' => $skills,
            'image' =>$img ,
            'name_banner_image' =>$bannerImg ,
            'sequence' => $sequence
          ]);

    }
   
}


?>