<?php
 
// check user guard

use App\Models\UserModule\User;

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
