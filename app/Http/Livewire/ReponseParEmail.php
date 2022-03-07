<?php

namespace App\Http\Livewire;

use App\Models\Reponse;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class ReponseParEmail extends Component
{
    /**
    * Livewire public properties
    */
    public $email;
    public $questionReponses = NULL;
    public $emailError = false;

    /**
     * Affiche la vue blade proposant de saisir une adresse mail.
     * @return Application|Factory|View
     */
    public function render()
    {
        return view('livewire.reponse-par-email');
    }

    /**
     * Récupère les Questions/Réponse à partir d'une adresse mail.
     * @param string $email
     * @return void
     */
    public function filterByEmail($email)
    {
        $questionReponses = Reponse::with('question')->where('email', $email)->orderBy('created_at', 'DESC')->get();
        if($questionReponses->count()) {
            $this->questionReponses = $questionReponses;
            $this->emailError = false;
        } else {
            $this->questionReponses = NULL;
            $this->emailError = true;
        }
    }
}
