<?php
namespace App\Services;

use App\Models\FlightDay;
use Illuminate\Support\Str;
use Intervention\Image\Laravel\Facades\Image;


class FlightCrudService{
    public function store( $name, $start_date , $end_date , $image){
    
        $year = date('Y');
        $img = $year . '_' . time() . '_' . Str::random(12) . '.' . $image->getClientOriginalExtension();
      
        $location = public_path('assets/images/' . $img);      
        Image::read($image)->save($location);           
     
        FlightDay::create([
            'name' => $name,
            'start_date' => $start_date,
            'end_date' => $end_date,
            'image' =>$img ,
          ]);

    }

  
   
}


?>