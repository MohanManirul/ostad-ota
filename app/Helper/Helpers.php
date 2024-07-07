<?php
 
// check user guard

use App\Models\UserModule\User;
use Illuminate\Support\Facades\File;

// check user guard
function guardCheck() { 
    if ( request()->header('role') == 'superadmin' ) {
        return 'superadmin';
    } elseif (request()->header('role') == 'admin' ) {
        return 'admin';
    }else{
        return false; 
    }

}
// check user guard

function getModel(){
    return  User::with('role')->first();  
}


function headerCheck() {
    if ( request()->header('role') == 'superadmin' ) {
        return true;
    } elseif ( request()->header('role') == 'admin'  ) {
      
        return false;
            // return getModel()->role->is_active ;        
       
    }else{
        return false; 
    }
}
// check user guard
 

//check user access permission check
if ( !function_exists('can')) {
    function can($can) {
        if (headerCheck() && getModel()->role !=null) {

            foreach (getModel()->role->permission as $permission) {
                if ($permission->key == $can) {
                    return true;
                }
            }
            return false;

        }
        return back();
    }
}
//check user access permission check

// Image Save And Delete:
if (!function_exists('makeDirectory')){
    function makeDirectory($location){
        if (!file::isDirectory(public_path(). $location)) {
            file::makeDirectory(public_path() . $location, 0777, true, true);
        }
    }
}
if (!function_exists('saveImage')) {
    function saveImage($image, $location){
        makeDirectory($location);
        $imageName = time() . random_int(10000000, 99999999) . '.' . $image->getClientOriginalExtension();
        $image->move(public_path() . $location, $imageName);

        return $location . $imageName;

    }
}

if (!function_exists('deleteImage')) {
    function deleteImage($image, $location){
       if (File::exists(public_path(). $image)) {
            File::delete(public_path() . $image);
       }

    }
}