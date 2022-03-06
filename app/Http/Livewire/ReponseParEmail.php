<?php

namespace App\Http\Livewire;

use App\Models\Question;
use App\Models\Reponse;
use Livewire\Component;

class ReponseParEmail extends Component
{
    public $email;
    public $questionReponses = NULL;
    public $emailError = false;

    public function render()
    {
        return view('livewire.reponse-par-email');
    }

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
