<?php
namespace App\Services;

use App\Models\Policies;

class PolicyCrudService{
    public function storeService($type, $descriptions){
    
        Policies::create([
            'type' => $type,
            'descriptions' => $descriptions
          ]);

    }

    public function updateService($type, $descriptions,$id){
    
        Policies::where('id', $id)->update([
            'type' => $type,
            'descriptions' => $descriptions
          ]);

    }
   
}


?>