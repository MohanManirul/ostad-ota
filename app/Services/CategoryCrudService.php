<?php
namespace App\Services;

use App\Models\Category;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;


class CategoryCrudService{
    public function storeCategory($name, $image,$sequence){    
              
        $img = time() . Str::random(12) . '.' . $image->getClientOriginalExtension();
        $location = public_path('assets/images/' . $img);      
        Image::make($image)->save($location);           
     
        Category::create([
            'name' => $name,
            'image' =>$img ,
            'sequence' => $sequence
          ]);

    }
   
}


?>