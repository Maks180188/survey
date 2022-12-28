<?php

namespace App\Http\Controllers;

use App\Http\Resources\SurveyResource;
use App\Models\Survey;

class QuestionController extends Controller
{
    public function getQuestion(Survey $survey): SurveyResource
    {
        return new SurveyResource($survey);
    }
}
