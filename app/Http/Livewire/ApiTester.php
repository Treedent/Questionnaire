<?php

namespace App\Http\Livewire;

use App\Models\Question;
use App\Models\Questionnaire;
use App\Models\Reponse;
use Livewire\Component;
use Illuminate\Support\Facades\Redirect;

class ApiTester extends Component
{

    public $surveys;
    public $questions;
    public $selectedSurvey = 0;
    public $selectedQuestion = 0;
    public $email;
    public $emailError = false;

    public function render()
    {
        $this->surveys = Questionnaire::all();
        return view('livewire.api-tester')->with('surveys', $this->surveys);
    }

    public function updatedSelectedSurvey($survey)
    {
        if ($survey > 0) {
            $this->questions = Question::where('questionnaire_id', $survey)->get();
        } else {
            $this->selectedQuestion = 0;
        }
    }

    public function generateJson($email) {
        $questionReponses = Reponse::with('question')->where('email', $email)->orderBy('created_at', 'DESC')->get();
        if($questionReponses->count()) {
            $this->emailError = false;
            $url = route('api.reponse-par-email', ['email'=>urlencode($email)]);
            $this->dispatchBrowserEvent('redirect-on-good-email', ['url' => $url]);

        } else {
            $questionReponses = NULL;
            $this->emailError = true;
        }
    }

}
