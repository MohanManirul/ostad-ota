<?php
namespace App\Services;


use App\Models\Service;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;


class ServiceCrudService{
    public function storeService($title, $descriptions,$image){
    
              
        $img = time() . Str::random(12) . '.' . $image->getClientOriginalExtension();
        $location = public_path('assets/images/' . $img);      
        Image::make($image)->save($location);           
     
        Service::create([
            'title' => $title,
            'descriptions' => $descriptions,
            'image' =>$img ,
          ]);

    }
   
}


?>