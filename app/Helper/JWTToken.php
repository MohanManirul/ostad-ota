<?php

namespace App\Helper;

use Exception;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class JWTToken{
      
    //create token
    public static function CreateToken($userEmail,$userID,$role):string
    {
        $key =env('JWT_KEY');
        $payload=[
            'iss'=>'laravel-token',
            'iat'=>time(),
            'exp'=>time()+24*60*60,
            'userEmail'=>$userEmail,
            'userID'=>$userID,
            'role'=>$role
        ];
        return JWT::encode($payload,$key,'HS256');
    }



public static function CreateTokenForSetPassword($userEmail,$userID):string{
    $key = env('JWT_KEY');
    $payload = [
            'iss'=>'laravel-token',
            'iat'=>time(),
            'exp'=>time()+60*60,
            'userEmail'=>$userEmail,
            'userID'=>$userID
    ];
    return JWT::encode($payload,$key,'HS256');
}

 

    //decode / verify token
    public static function VerifyToken($token):string|object{

        try {
            if($token==null){
                return 'unauthorized'; //string
            }
            else{
                
                $key =env('JWT_KEY');
                return  JWT::decode($token,new Key($key,'HS256')); //object
                // $token = JWT::decode($token,new Key($key,'HS256'));
                //  return $token->userEmail;
                
            }
        }
        catch (Exception $e){
            return 'unauthorized';
        }

    }
}
