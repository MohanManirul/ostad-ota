<?php

namespace App\Models\UserModule;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

      

    public function permission()
    {
        return $this->belongsToMany(Permission::class);
    }


    
}
