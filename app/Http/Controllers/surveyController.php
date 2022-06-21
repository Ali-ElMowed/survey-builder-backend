<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\survie;

class surveyController extends Controller
{   
    //function to add a new survey
    public function addSurvey(Request $request){

        $survey= new survie;
        $survey->survey_name = $request->survey_name;
        $survey->save();

        return self::returnResponse('survey added',200);
    }

    //function to delete survey
    public function destroySurvey($id){

        $survey= survie::find($id);
        if($survey){
            $survey->delete();
            return self::returnResponse('survye deleted',200);
        }
        else{
            return self::returnResponse('survey not found',200);
        }
    }

    //function to update survey
    public function updateSurvey(Request $request,$id){

        $survey = survie::find($id);
        
        if($survey){

            $survey->survey_name = $request->survey_name;
            $survey->update();

            return self::returnResponse("survey updated",200);
        }
        else{
            return self::returnResponse("survey not found",200);
        }
    }

    //function for getting all the questions that are related to the survey with this id
    public function getQuestions($id){

        $survey = survie::where('id',$id)->with('questions')->get();
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
