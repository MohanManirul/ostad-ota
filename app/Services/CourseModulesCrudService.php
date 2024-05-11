<?php
namespace App\Services;

use App\Models\CourseModule;


class CourseModulesCrudService{
    public function storeCourseModule($course_id, $start_date, $end_date, $frontend_title, $class_topics, $backend_title, $sequence){   

        CourseModule::create([
            'course_id' => $course_id,
            'start_date' => $start_date,
            'end_date' => $end_date,
            'frontend_title' => $frontend_title,
            'backend_title' => $backend_title,
            'class_topics' => $class_topics,
            'sequence' => $sequence
          ]);        

    }


    public function updateCourseModule($course_id, $start_date, $end_date, $frontend_title, $class_topics, $backend_title, $sequence, $id){   

        CourseModule::whereId($id)->update([
            'course_id' => $course_id,
            'start_date' => $start_date,
            'end_date' => $end_date,
            'frontend_title' => $frontend_title,
            'backend_title' => $backend_title,
            'class_topics' => $class_topics,
            'sequence' => $sequence
          ]);   




    }
   
}


?>