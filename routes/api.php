<?php

use App\Http\Controllers\answerController;
use App\Http\Controllers\questionController;
use App\Http\Controllers\surveyController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;   
use App\Http\Controllers\JWTController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['middleware' => 'api'], function($router) {
    Route::post('/register', [JWTController::class, 'register']);
    Route::post('/login', [JWTController::class, 'login']);
    Route::post('/logout', [JWTController::class, 'logout']);
    Route::post('/refresh', [JWTController::class, 'refresh']);
    Route::post('/profile', [JWTController::class, 'profile']);
});


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//question apis
Route::post("/add_question",[questionController::class, 'addQues']);
Route::delete("/delete_question/{id}",[questionController::class, 'destroyQues']);
Route::post("/update_question/{id}",[questionController::class, 'updateQues']);
Route::get("/get_answers/{id}",[questionController::class,'getAnswers']);
Route::get("/get_choices/{id?}",[questionController::class,'getQuestionChoices']);
Route::get("/get_question_types",[questionController::class,'getQuestionTypes']);
Route::post("/add_choice",[questionController::class,'addChoice']);
Route::post("/update_choice/{id}",[questionController::class, 'updateChoice']);



//survey apis
Route::get("/get_survey_questions/{id}",[surveyController::class,'getQuestions']);
Route::post("/add_survey",[surveyController::class, 'addSurvey']);
Route::post("/delete_survey/{id}",[surveyController::class, 'destroySurvey']);
Route::post("/update_survey/{id}",[surveyController::class, 'updateSurvey']);

//answer apis
Route::post("/add_answer",[answerController::class, 'addAnswer']);
Route::delete("/delete_answer/{id}",[answerController::class, 'destroyAnswer']);
Route::post("/update_answer/{id}",[answerController::class, 'updateAnswer']);


