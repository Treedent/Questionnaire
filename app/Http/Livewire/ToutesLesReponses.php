<?php

namespace App\Http\Livewire;

use App\Models\Question;
use App\Models\Questionnaire;
use App\Models\Reponse;
use Livewire\Component;

class ToutesLesReponses extends Component
{
    public $questionsReponses;

    public function render()
    {
        $this->questionsReponses = Reponse::with('question')->orderBy('created_at', 'DESC')->get();
        return view('livewire.toutes-les-reponses')->with('reponses', $this->questionsReponses);
    }
}
