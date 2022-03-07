<?php

namespace App\Http\Livewire;

use App\Models\Question;
use App\Models\Questionnaire;
use App\Models\Reponse;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Livewire\Component;

/**
 * Class ReponseForm
 * @package App\Http\Livewire
 */

class ReponseForm extends Component
{

    /**
     * Livewire public properties
     */

    /* ID du questionnaire par défaut */
    private $questId = 1;
    /* Données traitées par le formulaire */
    public $reponseform = [
        'reponse_1'    => '',
        'reponse_2'    => '',
        'reponse_3'    => '',
        'reponse_4'    => '',
        'reponse_5'    => '',
        'email_1'       => '',
        'email_2'       => ''
    ];
    /* Message au dessus du formulaire */
    public $topMessage;

    /**
     * Initialise le composant.
     */
    public function mount() {
        $this->reponseform['escobar'] = '';
        $this->topMessage = 'Veuillez répondre à toutes les questions du formulaire ci-dessous :';
    }

    /**
     * Affiche le formulaire du questionnaire.
     * @return Application|Factory|View
     */
    public function render()
    {
        $questionnaire = Questionnaire::where('id',$this->questId)->first();
        $questions = Question::where('questionnaire_id',$this->questId)->orderBy('rang', 'ASC')->get();
        return view('livewire.reponse-form', compact('questionnaire','questions'))->layout('layouts.guest');
    }

    /**
     * Valide le formulaire du questionnaire et stocke les résultats en base.
     *
     * @return RedirectResponse
     * @throws ValidationException
     */
    public function validateForm()
    {
        // Validation formulaire
        if (is_array($this->reponseform)) {
            $validData = Validator::make($this->reponseform, [
                'escobar' => ['nullable', 'string', 'max:0'],
                'reponse_1' => ['required', 'max:2048'],
                'reponse_2' => ['required', 'max:2048'],
                'reponse_3' => ['required', 'max:2048'],
                'reponse_4' => ['required', 'max:2048'],
                'reponse_5' => ['required', 'max:2048'],
                'email_1' => ['required', 'email:rfc,dns'],
                'email_2' => ['required', 'same:email_1']
            ], [], [
                'reponse_1' => '&laquo; Réponse 1 &raquo;',
                'reponse_2' => '&laquo; Réponse 2 &raquo;',
                'reponse_3' => '&laquo; Réponse 3 &raquo;',
                'reponse_4' => '&laquo; Réponse 4 &raquo;',
                'reponse_5' => '&laquo; Réponse 5 &raquo;',
                'email_1'   => '&laquo; Email &raquo;',
                'email_2'   => '&laquo; Confirmation email &raquo;'
            ])->validate();

            // Formate les données avant sauvegarde en base
            unset($validData['escobar']);
            for($i=1;$i<=5;$i++) {
                $data2store = [
                    'reponse'       => $validData['reponse_' . $i],
                    'question_id'   => $i,
                    'email'         =>  $validData['email_1']
                ];
                Reponse::create($data2store);
            }
        }
        return redirect('/merci');
    }
}
