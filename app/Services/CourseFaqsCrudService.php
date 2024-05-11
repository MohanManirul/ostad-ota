<?php
namespace App\Services;
use App\Models\Faq;

class CourseFaqsCrudService{
    public function storeCourseFaq($question, $answer,  $type , $sequence){   

        Faq::create([
            'question' => $question,
            'answer' => $answer,
            'type' => $type,
            'sequence' => $sequence
          ]);        

    }


    public function updateCourseFaq($question, $answer,  $type , $sequence, $id){   

        Faq::whereId($id)->update([
            'question' => $question,
            'answer' => $answer,
            'type' => $type,
            'sequence' => $sequence
          ]);   




    }
   
}


?>