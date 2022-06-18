<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\question;

class questionController extends Controller
{
    //Add question function 
    public function addQues(Request $request)
    {

        $question = new question;

        $question->survey_id = $request->survey_id;
        $question->question_type_id = $request->question_type_id;
        $question->question_content = $request->question_content;
        $question->save();

        //return json status:succes
        return self::returnResponse('success', 200);
    }

    //Delete question function
    public function destroyQues($id)
    {
        $question = question::find($id);

        //if there is a question has the id in the parameter delete it
        if ($question) {
            $question->delete();

            return self::returnResponse('question deleted', 200);
        }
        //if there is no question in this id tell the user no question found
        else {
            return self::returnResponse('no question found', 200);
        }
    }

    //Upadet question function 
    public function updateQues(Request $request, $id)
    {

        $question = question::find($id);

        //If question found has this id update it
        if ($question) {

            $question->survey_id = $request->survey_id;
            $question->question_type_id = $request->question_type_id;
            $question->question_content = $request->question_content;

            $question->update();

            return self::returnResponse('question updated', 200);
        }
        //If question doesn't exist
        else{
            return self::returnResponse('question doesnt exist',200);
        }
    }


    //function to be used in all functions for response return
    public function returnResponse($status, $code, $data = null)
    {
        return response()->json([
            'status' => $status,
            'data' => $data
        ], $code);
    }
}
