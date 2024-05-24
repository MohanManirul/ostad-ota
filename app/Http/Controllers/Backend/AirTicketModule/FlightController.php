<?php

namespace App\Http\Controllers\Backend\AirTicketModule;

use App\Http\Controllers\Controller;
use App\Http\Requests\FlightCrudRequest;
use App\Services\FlightCrudService;
use App\Helper\ResponseHelper;
use App\Models\FlightDay;
use DateTime;
use Exception;
use Illuminate\Http\Request;
use Intervention\Image\Laravel\Facades\Image;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class FlightController extends Controller
{
    public $folderPath;
    public $flightCrudService;

    public function __construct(FlightCrudService $flightCrudService)
    {
        $this->folderPath = 'backend.pages.';
        $this->flightCrudService = $flightCrudService;
    }

    //index
    public function index(){
        if(request()->header('role') == 'superadmin'){
            return view($this->folderPath.'basic-crud-page');
        }else{
            return view('errors.404');
        }
    }


     //store
     public function store(FlightCrudRequest $request)
     {  
        
         if(request()->header('role') == 'superadmin'){       
             try{

                // Split the date range by " - "
                $dates = explode(" - ", $request->flightOperatingDate);
                
                $start_date = $dates[0]; // Start date
                $end_date = $dates[1];   // End date

                // Create DateTime objects from the original format
                $start_date_obj = DateTime::createFromFormat('d/m/Y', $start_date);
                $end_date_obj = DateTime::createFromFormat('d/m/Y', $end_date);

                // Format the dates to Y-m-d
                $start_date_formatted = $start_date_obj->format('Y-m-d');
                $end_date_formatted = $end_date_obj->format('Y-m-d');


                $this->flightCrudService->store($request->name, $start_date_formatted , $end_date_formatted , $request->image);
                return ResponseHelper::Out('success',"",200);
             }catch(Exception $e){
                 return ResponseHelper::Out('fail',$e,200);
             }
         }else{
             return view('errors.404');
         }
 
     }

     //data 
     public function data(){
        if(request()->header('role') == 'superadmin'){
            try{
                $data= FlightDay::select('id','name','start_date','end_date','image')->get();
                return ResponseHelper::Out('success',$data,200);
            }catch(Exception $e){
                return ResponseHelper::Out('fail',$e,200);
            }
        }else{
            return view('errors.404');
        }
     }


       /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request)
    {
       
        if(request()->header('role') == 'superadmin'){
            try{
                $data = FlightDay::select('id','name','start_date','end_date','image')->findOrFail($request->input('id'));                
                return ResponseHelper::Out('success',$data,200);
            }catch(Exception $e){
                return ResponseHelper::Out('fail',$e,200);
            }
        }else{
            return view('errors.404');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        if(request()->header('role') == 'superadmin'){
            try{
             
               $flight = FlightDay::findOrFail($request->input('id'));

                $flight->name = $request->name;
               
                // Split the date range by " - "
                $dates = explode(" - ", $request->flightOperatingDateUpdate);
                
                $start_date = $dates[0]; // Start date
                $end_date = $dates[1];   // End date

                // Create DateTime objects from the original format
                $start_date_obj = DateTime::createFromFormat('d/m/Y', $start_date);
                $end_date_obj = DateTime::createFromFormat('d/m/Y', $end_date);

                // Format the dates to Y-m-d
                $start_date_formatted = $start_date_obj->format('Y-m-d');
                $end_date_formatted = $end_date_obj->format('Y-m-d');

                $flight->start_date = $start_date_formatted;
                $flight->end_date = $end_date_formatted;

                // image insert 
               // image insert 
               if ($request->image) { 

                    //delete that image
                    if (File::exists('assets/images/' . $flight->image)) {
                        File::delete('assets/images/' . $flight->image);
                    }
                    $image = $request->file('image');
                    $year = date('Y');
                    $img = $year . '_' . time() . '_' . Str::random(12) . '.' . $image->getClientOriginalExtension();
                    $location = public_path('assets/images/' . $img);
                    Image::read($image)->save($location);
                    $flight->image = $img;
                }
               
                if($flight->save()){
                    return ResponseHelper::Out('success',"",200);
                }
            
            }catch(Exception $e){
                return ResponseHelper::Out('fail',$e,200);
            } 
        }else{
            return view('errors.404');
        } 

    }


    //delete
    public function delete(Request $request)
    {
        return $request->all();
        if(request()->header('role') == 'superadmin'){
            try{
             
               File::delete('assets/images/' . $request->filePath);             
               $data=FlightDay::where('id' , $request->input('id'))->delete();
               return ResponseHelper::Out('success',$data,200);
            
            }catch(Exception $e){
                return ResponseHelper::Out('fail',$e,200);
            } 
        }else{
            return view('errors.404');
        } 
    }

     

}
