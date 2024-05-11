<?php

namespace App\Http\Controllers\Backend\Auth;

use App\Helper\JWTToken;
use App\Helper\ResponseHelper;
use App\Http\Controllers\Controller;
use App\Models\UserModule\SuperAdmin;
use App\Models\UserModule\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class LoginController extends Controller
{
    public $folderPath;

    public function __construct()
    {
        $this->folderPath = 'backend.pages.auth.';

    }


    //LoginPage
    public function LoginPage():View
    {
        return view($this->folderPath.'login-page');
    }

    // loginCheck
    public function loginCheck(Request $request)
      {
       
          try {
  
            $request->validate([
                'email' => 'required|string|email|max:50',
                'password' => 'required|string|min:3'
            ]);

              $superAdmin = SuperAdmin::where('email', $request->email)->first();
  
              
              $user = User::where('email', $request->email)->where('is_active',true)->first();
   
              if ($superAdmin) {
                
                if (!$superAdmin || !Hash::check($request->input('password'), $superAdmin->password)) {
                    return  ResponseHelper::Out('fail',null,401);
                }
                $role = 'superadmin';
                $token = JWTToken::CreateToken($request->email ,$superAdmin->id,$role);
                return  ResponseHelper::Out('success',$role,200)->cookie('token',$token,60*24*30);            

              }
              elseif( $user ){
                if (!$user || !Hash::check($request->input('password'), $user->password)) {
                    return  ResponseHelper::Out('fail',null,401);
                } 
                $role = 'admin';
                $token = JWTToken::CreateToken($request->email ,$user->id,$role);
                return  ResponseHelper::Out('success',$role,200)->cookie('token',$token,60*24*30); 
              }

          } 
          catch (Exception $e) {
            return  ResponseHelper::Out('fail',null,401);
          }
  
  
      }
       

    














}
