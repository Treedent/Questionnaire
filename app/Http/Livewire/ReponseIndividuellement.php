<?php

namespace App\Http\Livewire;

use App\Models\Question;
use App\Models\Questionnaire;
use App\Models\Reponse;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class ReponseIndividuellement extends Component
{

    /**
     * Livewire public properties
     */
    public $surveys;
    public $questions;
    public $reponses;
    public $selectedSurvey = 0;
    public $selectedQuestion = 0;

    /**
     * Affiche la vue blade proposant de sélectioner un questionnaire.
     * @return Application|Factory|View
     */
    public function render()
    {
        $this->surveys = Questionnaire::all();
        return view('livewire.reponse-individuellement')->with('surveys',$this->surveys);
    }

    /**
     * Récupère les questions une fois le questionnaire sélectionné.
     * @param Integer $survey
     * @return void
     */
    public function updatedSelectedSurvey($survey)
    {
        if ($survey > 0) {
            $this->questions = Question::where('questionnaire_id', $survey)->get();
        } else {
            $this->selectedQuestion = 0;
        }
    }

    /**
     * Récupère les questions/réponse une fois la question sélectionnée.
     * @param Integer $question
     * @return void
     */
    public function updatedselectedQuestion($question)
    {
        if ($question > 0) {
            $this->reponses = Reponse::where('question_id', $question)->orderBy('created_at', 'DESC')->get();
        }
    }

}

