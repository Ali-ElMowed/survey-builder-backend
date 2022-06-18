<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\survie;

class surveyController extends Controller
{   
    //function for getting all the questions that are related to the survey with this id
    public function getQuestions($id){

        $survey = survie::where('id',$id)->with('question')->get();
        return self::returnResponse('success',200,$survey);

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
