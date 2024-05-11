<?php

namespace App\Helper;

use Exception;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class StudentJWTToken{
      
    //create token
    public static function CreateTokenForStudent($studentEmail,$studentID):string
    {
        $key =env('JWT_KEY');
        $payload=[
            'iss'=>'laravel-token',
            'iat'=>time(),
            'exp'=>time()+24*60*60,
            'studentEmail'=>$studentEmail,
            'studentID'=>$studentID
        ];
        return JWT::encode($payload,$key,'HS256');
    }



public static function CreateTokenForSetPasswordForStudent($studentEmail,$studentID):string{
    $key = env('JWT_KEY');
    $payload = [
            'iss'=>'laravel-token',
            'iat'=>time(),
            'exp'=>time()+60*60,
            'studentEmail'=>$studentEmail,
            'studentID'=>$studentID
    ];
    return JWT::encode($payload,$key,'HS256');
}

 

    //decode / verify token
    public static function VerifyTokenForStudent($studentToken):string|object{

        try {
            if($studentToken==null){
                return 'student-unauthorized'; //string
            }
            else{
                
                $key =env('JWT_KEY');
                return  JWT::decode($studentToken,new Key($key,'HS256')); //object
                // $token = JWT::decode($token,new Key($key,'HS256'));
                //  return $token->studentEmail;
                
            }
        }
        catch (Exception $e){
            return 'student-unauthorized';
        }

    }
}
