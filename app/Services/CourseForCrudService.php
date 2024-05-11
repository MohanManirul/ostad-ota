<?php
namespace App\Services;

use App\Models\CourseFor;

class CourseForCrudService{
    public function storeCourseFor($course_id, $title,  $sequence){   

        CourseFor::create([
            'course_id' => $course_id,
            'title' => $title,
            'sequence' => $sequence
          ]);        

    }


    public function updateCourseFor($course_id, $title, $sequence, $status, $id){   

        CourseFor::whereId($id)->update([
            'course_id' => $course_id,
            'title' => $title,
            'sequence' => $sequence,
            'status' => $status
          ]);   




    }
   
}


?>