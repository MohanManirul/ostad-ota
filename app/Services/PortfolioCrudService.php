<?php
namespace App\Services;

use App\Models\Portfolio;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;


class PortfolioCrudService{
    public function storeService($name, $descriptions,$url,$sequence,$image){
    
              
        $img = time() . Str::random(12) . '.' . $image->getClientOriginalExtension();
        $location = public_path('assets/images/' . $img);      
        Image::make($image)->save($location);           
     
        Portfolio::create([
            'name' => $name,
            'descriptions' => $descriptions,
            'url' => $url,
            'sequence' => $sequence,
            'image' =>$img ,
          ]);

    }

    public function updateService($name, $descriptions,$url,$sequence,$image,$id){
    
              
        $img = time() . Str::random(12) . '.' . $image->getClientOriginalExtension();
        $location = public_path('assets/images/' . $img);      
        Image::make($image)->save($location);           
     
        Portfolio::create([
            'name' => $name,
            'descriptions' => $descriptions,
            'url' => $url,
            'sequence' => $sequence,
            'image' =>$img ,
          ]);

    }
   
}


?>