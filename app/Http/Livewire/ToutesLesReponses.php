<?php

namespace App\Http\Livewire;

use App\Models\Reponse;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class ToutesLesReponses extends Component
{
    /**
    * Livewire public properties
    */
    public $questionsReponses;

    /**
     * Récupère les Questions/Réponse pour les transmettre à la vue blade.
     * @return Application|Factory|View
     */
    public function render()
    {
        $this->questionsReponses = Reponse::with('question')->orderBy('created_at', 'DESC')->get();
        return view('livewire.toutes-les-reponses')->with('reponses', $this->questionsReponses);
    }
}
