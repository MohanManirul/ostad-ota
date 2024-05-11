<?php
namespace App\Services;

use App\Models\Team;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;


class TeamCrudService{
    public function storeService($name, $designation,$facebook,$twitter,$instagram,$linkedin,$sequence,$image){
    
              
        $img = time() . Str::random(12) . '.' . $image->getClientOriginalExtension();
        $location = public_path('assets/images/' . $img);      
        Image::make($image)->save($location);           
     
        Team::create([
            'name' => $name,
            'designation' => $designation,
            'facebook' => $facebook,
            'twitter' => $twitter,
            'instagram' => $instagram,
            'linkedin' => $linkedin,
            'sequence' => $sequence,
            'image' =>$img ,
          ]);

    }

    public function updateService($name, $descriptions,$url,$sequence,$image,$id){
    
              
        $img = time() . Str::random(12) . '.' . $image->getClientOriginalExtension();
        $location = public_path('assets/images/' . $img);      
        Image::make($image)->save($location);           
     
        Team::create([
            'name' => $name,
            'descriptions' => $descriptions,
            'url' => $url,
            'sequence' => $sequence,
            'image' =>$img ,
          ]);

    }
   
}


?>