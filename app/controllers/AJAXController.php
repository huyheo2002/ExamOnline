<?php

class AJAXController
{
    public function getQuestionsFromCategory() 
    {
        $id = $_POST["category_id"] ?? -1;
        $category = Category::find($id);
        if ($category !== null) {
            $questions = $category->questions();
        }

        echo json_encode($questions ?? []);
    }

    public function getExamsFromCategory() 
    {
        $id = $_POST["category_id"] ?? -1;
        $category = Category::find($id);
        if ($category !== null) {
            $exams = $category->exams();
        }

        echo json_encode($exams ?? []);
    }
}
