<?php
namespace App\Services;

use App\Models\About;


class AboutCrudService{
    public function storeAbout($descriptions){             
     
        About::create([
            'descriptions' => $descriptions
          ]);

    }
   
}





?>