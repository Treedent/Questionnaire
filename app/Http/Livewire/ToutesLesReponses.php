<?php

namespace App\Http\Livewire;

use App\Models\Questionnaire;
use Livewire\Component;

class ToutesLesReponses extends Component
{

    public $choix_questionnaire;

    /**
     * Initialise le composant.
     */
    public function mount()
    {
        $this->choix_questionnaire = 1;
    }

    public function render()
    {
        $questionnaires = Questionnaire::all();
        return view('livewire.toutes-les-reponses', compact('questionnaires'));
    }

    public function updated($name, $value)
    {
        dd(['name'=>$name, $value]);
    }

}
