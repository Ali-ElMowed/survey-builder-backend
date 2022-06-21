<?php

namespace App\Http\Controllers;

use App\Models\choice;
use Illuminate\Http\Request;
use App\Models\question;
use App\Models\question_type;

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
        else {
            return self::returnResponse('question doesnt exist', 404);
        }
    }

    //function to get the answer of the targted question
    public function getAnswers($id)
    {

        $question = question::where('id', $id)->with('answer')->get();
        return self::returnResponse("succes", 200, $question);
    }

    //function to the question choices
    public function getQuestionChoices($id = null)
    {

        if ($id) {
            $question = question::where('id', $id)->with("choices")->get();
            return $question;
        } else {
            $choice = choice::all();
            return $choice;
        }
    }

    //function to get the question types
    public function getQuestionTypes()
    {

        $types = question_type::all();

        return self::returnResponse("success", 200, $types);
    }

    //function to add questions choice
    public function addChoice(Request $request)
    {

        $choice = new choice;

        $choice->question_id = $request->question_id;
        $choice->choice_content = $request->choice_content;
        $choice->save();

        return self::returnResponse("choice added", 200);
    }

    //function update choice 
    public function updateChoice(Request $request, $id)
    {

        $choice = choice::find($id);

        //If choice found has this id update it
        if ($choice) {

            $choice->question_id = $request->question_id;
            $choice->choice_content = $request->choice_content;

            $choice->update();

            return self::returnResponse('choice updated', 200);
        }
        //If choice doesn't exist
        else {
            return self::returnResponse('choice doesnt exist', 404);
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
