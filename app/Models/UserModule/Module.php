<?php

namespace App\Models\UserModule;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    use HasFactory;

    public function sub_module()
    {
        return $this->hasMany(SubModule::class);
    }



    public function permission()
    {
        return $this->hasMany(Permission::class);
    }
    
}
