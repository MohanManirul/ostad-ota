<?php

namespace App\Http\Controllers\Backend\UserModule;

use App\Helper\JWTToken;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UserModule\Role;
use App\Models\UserModule\User;
use Exception;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{ 
    public $folderPath;
    public function __construct()
    {
        $this->folderPath = 'backend.pages.user_module.';
    }
 
  

    //userList
    public function userListPage()
    {
        if(can('all_user') || request()->header('role') == 'superadmin'){
            return view($this->folderPath.'user-list-page');
        }else{
            return view('errors.404');
        }
    }
    
    //userListData
    public function userListData()
    {
        if(can('all_user') || request()->header('role') == 'superadmin'){
            try{                
                $rows = User::with('role')->select('id', 'name','email', 'role_id', 'is_active')->get();
                return response()->json(['status' => 'success', 'rows' => $rows]);
            }catch(Exception $e){
                return response()->json(['status' => 'fail', 'message' => $e->getMessage()]);
            }
        }else{
            return view('errors.404');
        }
    }


    // userRoleList
    public function userRoleList(){
        if(can('all_user') || request()->header('role') == 'superadmin'){
            try{
                $rows = Role::where('is_active', true)->where('is_delete', false)->get();
                return response()->json(['status' => 'success', 'rows' => $rows]);
            }catch(Exception $e){
                return response()->json(['status' => 'fail', 'message' => $e->getMessage()]);
            }
        }else{
            return view('errors.404');
        }
       
    }


      //add
    public function add(Request $request)
    {
        if(can('add_user') || request()->header('role') == 'superadmin'){
            $request->validate([
                'name' => 'required',
                'email' => 'required|unique:users,email',
                'phone' => 'required|numeric|unique:users,phone|regex:/(01)[0-9]{9}/',
                'role_id' => 'required|numeric',
                'password' => 'required|confirmed|min:6',
            ]);
            try {
                $user = new User();
                $user->name = $request->name;
                $user->email = $request->email;
                $user->phone = $request->phone;
                $user->role_id = $request->role_id;
                $user->password = Hash::make($request->password);
                $user->is_active = true;
                $user->is_delete = false;

                if ($user->save()) {
                    return response()->json(['status' => 'success', 'message' => 'New User Created'],200);
                    }
 
                } catch (Exception $e) {
                    return response()->json(['error' => $e->getMessage()], 200);
                }
            }else{
            return view('errors.404');
        }
    } 

    //userDataById
    public function userDataById(Request $request)
    {
        return $request->input('id');
        if(can('edit_user') || request()->header('role') == 'superadmin'){
            try{
                $user = User::with('role')->findOrFail($request->input('id'));
                $roles = Role::where('is_active', true)->where('is_delete', false)->get();
                return response()->json(['status' => 'success', 'user' => $user ,'roles' => $roles]);
            }catch(Exception $e){
                return response()->json(['error' => $e->getMessage()], 200);
            }
        }else{
            return view('errors.404');
        }
       
    }
 
    //update
 
    public function userUpdate(Request $request){
            
        if(can('edit_user') || request()->header('role') == 'superadmin'){    
            $id=$request->input('id');       
                try{
    
                    User::where('id',$id)->update([
                        'name'=>$request->input('name'),
                        'email'=>$request->input('email'),
                        'phone'=>$request->input('phone'),
                        'role_id'=>$request->input('role_id'),
                    ]);

                    return response()->json(['status' => 'success', 'message' => "Request Successful"]);
                
                }catch(Exception $e){
                    return response()->json(['status' => 'fail', 'message' => $e->getMessage()]);
                }
            }else{
                return view('errors.404');
            }
       
    }



}
