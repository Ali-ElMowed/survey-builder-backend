<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\answer;

class answerController extends Controller
{
    //Add answer function 
    public function addAnswer(Request $request)
    {

        $answer = new answer;

        $answer->user_id = $request->user_id;
        $answer->question_id = $request->question_id;
        $answer->answer_content = $request->answer_content;
        $answer->save();

        //return json status:succes
        return self::returnResponse('answer added', 200);
    }

    //Delete answer function
    public function destroyAnswer($id)
    {
        $answer = answer::find($id);

        //if there is a answer has the id in the parameter delete it
        if ($answer) {
            $answer->delete();

            return self::returnResponse('answer deleted', 200);
        }
        //if there is no answer in this id tell the user no answer found
        else {
            return self::returnResponse('no answer found', 200);
        }
    }

    //Upadet answer function 
    public function updateAnswer(Request $request, $id)
    {

        $answer = answer::find($id);

        //If answer found has this id update it
        if ($answer) {

            $answer->user_id = $request->user_id;
            $answer->question_id = $request->question_id;
            $answer->answer_content = $request->answer_content;

            $answer->update();

            return self::returnResponse('answer updated', 200);
        }
        //If answer doesn't exist
        else{
            return self::returnResponse('answer doesnt exist',200);
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
