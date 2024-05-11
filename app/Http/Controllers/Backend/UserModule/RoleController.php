<?php

namespace App\Http\Controllers\Backend\UserModule;
 
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Exception;
use App\Models\UserModule\Module;
use App\Models\UserModule\Role;
use Illuminate\Support\Facades\DB;



class RoleController extends Controller
{
    

    public $folderPath;
    public function __construct()
    {
        $this->folderPath = 'backend.pages.user_module.role.';
    }

 
  
    //roleList
    public function roleList()
    {
        if(can('roles') || request()->header('role') == 'superadmin' ){
            return view($this->folderPath.'role-list-page');
        }else{
            return view('errors.404');
        }
    }
     
    //addPage
    public function addPage()
    {
        if(can('add_role') || request()->header('role') == 'superadmin'){
            $modules = Module::with('permission')->get();
            return view($this->folderPath.'role-add-page',compact('modules'));
        }else{
            return view('errors.404');
        }
    }

   
    //roleListData
    public function roleListData(){
        if(can('roles') || request()->header('role') == 'superadmin'){
            try{
                $rows = Role::select('id', 'name', 'is_active', 'is_delete')->get();
                return response()->json(['status' => 'success', 'rows' => $rows]);
            }catch(Exception $e){
                return response()->json(['status' => 'fail', 'message' => $e->getMessage()]);
            }
        }else{
            return view('errors.404');
        }
     
    }


    // public function permissionListData(){
    //     if (can('add_role')) {
    //         try{
    //             $rows = Module::with('permission')->get();
    //             return response()->json(['status' => 'success', 'rows' => $rows]);
    //         }catch(Exception $e){
    //             return response()->json(['status' => 'fail', 'message' => $e->getMessage()]);
    //         }
    //     }
    // }



    //add page
    public function add_page()
    {
        if(can('add_role') || request()->header('role') == 'superadmin'){
            $modules = Module::with('permission')->get();
            return view($this->folderPath. 'add', compact('modules'));
        }else{
            return view('errors.404');
        }
    }

    //add
    public function roleCreate(Request $request)
    {

      
        // return $request->all();
        // return $request['permission'];
        // return $name= $request->input('name');
        if(can('add_role') || request()->header('role') == 'superadmin'){
            $request->validate([
                'name' => 'required|unique:roles,name'
            ]);
            DB::beginTransaction();
            try {
                if ($request['permission']) {
                    $role = new Role();
                    $role->name = $request->name;
                    $role->is_active = true;
                    $role->is_delete = false;
                    if ($role->save()) {
                        foreach ($request['permission'] as $permission) {
                            $role->permission()->attach($permission);
                        }
                        DB::commit();
                        return response()->json(['status' => 'success']);
                    }
                } else {
                    return response(['warning' => 'Please choose user permission']);
                }
            } catch (Exception $e) {
                DB::rollBack();
                return response()->json(['error' => $e->getMessage()], 200);
            }
        }else{
            return view('errors.404');
        }
       
    }
 
    //edit page
    public function edit_page($guard,$id)
    {
        if(can('edit_role') || request()->header('role') == 'superadmin'){
            $modules = Module::with('permission')->get();
            $role = Role::findOrFail($id);
            return view($this->folderPath. 'role-update-page', compact('modules', 'role'));
        }else{
            return view('errors.404');
        }
    }

    //roleUpdate 
    public function roleUpdate(Request $request, $guard ,$id)
    {
        if(can('edit_role') || request()->header('role') == 'superadmin'){
            $request->validate([
                'name' => 'required|unique:roles,name,'.$id
            ]);
            DB::beginTransaction();
            try {
                if ($request['permission']) {
                    $role = Role::findOrFail($id);
                    $role->name = $request->name;
                    $role->is_active = $request->is_active;
                    $role->is_delete = false;
                    if ($role->save()) {
                        $role->permission()->detach();
                        foreach ($request['permission'] as $permission) {
                            $role->permission()->attach($permission);
                        }
                        DB::commit();
                        return response()->json(['status' => 'success']);
                    }
                } else {
                    return response(['warning' => 'Please choose user permission']);
                }
            } catch (Exception $e) {
                DB::rollBack();
                return response()->json(['error' => $e->getMessage()], 200);
            }
        }else{
            return view('errors.404');
        }
       
    }

}

