<?php
namespace App\Services\Frontend;

use App\Models\Student;
use Illuminate\Support\Facades\Hash;

class StudentRegistrationService{
    public function studentRegistration($email, $phone, $password){             
        Student::create([                              
            'email' => $email,                
            'phone' => $phone,
            'password' => Hash::make($password)
        ]);

    }
   
}





?>