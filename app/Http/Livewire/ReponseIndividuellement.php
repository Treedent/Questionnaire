<?php

namespace App\Http\Livewire;

use App\Models\Question;
use App\Models\Questionnaire;
use App\Models\Reponse;
use Livewire\Component;

class ReponseIndividuellement extends Component
{

    public $surveys;
    public $questions;
    public $reponses;
    public $selectedSurvey = 0;
    public $selectedQuestion = 0;

    public function render()
    {
        $this->surveys = Questionnaire::all();
        return view('livewire.reponse-individuellement')->with('surveys',$this->surveys);
    }

    public function updatedSelectedSurvey($survey)
    {
        if ($survey > 0) {
            $this->questions = Question::where('questionnaire_id', $survey)->get();
        } else {
            $this->selectedQuestion = 0;
        }
    }

    public function updatedselectedQuestion($question)
    {
        if ($question > 0) {
            $this->reponses = Reponse::where('question_id', $question)->orderBy('created_at', 'DESC')->get();
        }
    }

}

