<?php

namespace App\Http\Livewire;

use App\Models\Question;
use App\Models\Questionnaire;
use App\Models\Reponse;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Component;
use phpDocumentor\Reflection\Types\Integer;

class ApiTester extends Component
{

    /**
     * Livewire public properties
     */
    public $surveys;
    public $questions;
    public $selectedSurvey = 0;
    public $selectedQuestion = 0;
    public $email;
    public $emailError = false;

    /**
     * Récupère les Questionnaires pour les transmettre à la vue blade.
     * @return Application|Factory|View
     */
    public function render()
    {
        $this->surveys = Questionnaire::all();
        return view('livewire.api-tester')->with('surveys', $this->surveys);
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
     * Génère l'url de consultation du flux Json des questions à partir d'une adresse mail
     * et la transmet à un JavaScript présent dans la vue.
     * @param string $email
     * @return void
     */
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
