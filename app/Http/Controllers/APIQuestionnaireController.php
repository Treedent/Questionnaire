<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Questionnaire;
use App\Models\Reponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class APIQuestionnaireController extends Controller
{
    /**
     *
     * @return JsonResponse
     */
    public function toutesLesReponses()
    {
        $reponses = Reponse::all();
        return response()->json($reponses);
    }

    /**
     *
     * @param Request $email
     * @return JsonResponse
     */
    public function reponseParEmail($email)
    {
        $questionReponses = Reponse::with('question')->where('email', $email)->orderBy('created_at', 'DESC')->get();
        return response()->json($questionReponses);
    }

    /**
     * Génère le flux des réponses par question.
     * @param int $question_id
     * @return JsonResponse
     */
    public function reponseIndividuellement($question_id)
    {
        $reponses = Reponse::where('question_id', $question_id)->orderBy('created_at', 'DESC')->get();
        return response()->json($reponses);
    }
}
