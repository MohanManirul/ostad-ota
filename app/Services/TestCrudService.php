<?php
namespace App\Services;

use App\Models\Post;
use App\Models\Test;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;


class TestCrudService{
    public function storeTest($name){
    
        Test::create([
            'name' => $name,
          ]);
    }
   
}


?>