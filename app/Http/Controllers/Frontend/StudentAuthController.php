<?php

namespace App\Http\Controllers\Frontend;

use App\Helper\JWTToken;
use App\Helper\ResponseHelper;
use App\Helper\StudentJWTToken;
use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\RegistrationRequest;
use App\Models\Student;
use App\Services\Frontend\StudentRegistrationService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;


class StudentAuthController extends Controller
{
    
    protected $folderPath;
    protected $studentRegistrationService;
    public function __construct(StudentRegistrationService $studentRegistrationService)
    {
        $this->folderPath = 'frontend.auth.';
        $this->studentRegistrationService = $studentRegistrationService ;
    }
    
    //login page
    function LoginPage():View{
        return view($this->folderPath.'login-page');
    }

    //RegistrationPage
    function RegistrationPage():View{
        return view($this->folderPath.'registration-page');
    }

    //SendOtpPage
    function SendOtpPage():View{
        return view($this->folderPath.'send-otp-page');
    }

    //VerifyOTPPage
    function VerifyOTPPage():View{
        return view($this->folderPath.'verify-otp-page');
    }

    //ResetPasswordPage
    function ResetPasswordPage():View{
        return view($this->folderPath.'reset-pass-page');
    }

   //ProfilePage 
    function ProfilePage():View{
        return view($this->folderPath.'dashboard.profile-page');
    }


    //Registration

    function Registration(RegistrationRequest $request):JsonResponse
    {
       
        try {
            
            $this->studentRegistrationService->studentRegistration($request->email, $request->phone,$request->password);
            return ResponseHelper::Out('success','',200);

        } catch (Exception $e) {
            return ResponseHelper::Out('fail',$e,200);

        }
    }



    // doLogin
    public function doLogin(Request $request)
    {
     
        try {

          $request->validate([
              'email' => 'required|string|email|max:50',
              'password' => 'required|string|min:3'
          ]);

            $student = Student::where('email', $request->email)->where('status',true)->first();
 
            if ($student) {
                if (!$student || !Hash::check($request->input('password'), $student->password)) {
                
                  return  ResponseHelper::Out('fail',null,401);
              }
              $studentToken = StudentJWTToken::CreateTokenForStudent($request->email ,$student->id);
              return  ResponseHelper::Out('success','',200)->cookie('student-token',$studentToken,60*24*30);            

            }
           

        } 
        catch (Exception $e) {
          return  ResponseHelper::Out('fail',null,401);
        }


    }









}
