<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            API RESTful Tester
        </h2>
    </x-slot>

    @php
        $arrow = '<span class="mt-2 ml-2"><svg viewBox="0 0 20 20" fill="currentColor" class="w-4 h-4"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg></span>';
    @endphp

    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">

        <div class="col-span-8 sm:col-span-4 m-md px-2 py-2">
            <h2 class="text-lg font-bold">Toutes les réponses</h2>
            <a href="{{ route('api.toutes-les-reponses') }}" target="_blank">
                <div class="mt-3 flex items-center text-sm font-semibold text-teal-700">
                    <div class="bg-teal-300 hover:bg-teal-500 text-lg font-bold py-2 px-4 rounded inline-flex">Consulter le flux {!! $arrow !!}</div>
                </div>
            </a>
        </div>

        <x-jet-section-border />


        <div class="col-span-8 sm:col-span-4 m-md px-2 py-2">
            <h2 class="text-lg font-bold">Réponses par question</h2>
            <form>

                <div class="col-span-8 sm:col-span-4 m-md px-2 py-2">
                    <x-jet-label for="questionnaire" value="Veuillez sélectionner un questionnaire"/>
                    <select id="questionnaire" class="w-full mt-1 border-gray-300 focus:border-teal-300 focus:ring focus:ring-teal-200 focus:ring-opacity-50 rounded-md shadow-sm transition ease-in-out"
                            autocomplete="off"
                            wire:model="selectedSurvey">
                        <option value="0">Veuillez faire un choix...</option>
                        @foreach ($surveys as $survey2)
                            <option value="{{$survey2->id}}">{{$survey2->questionnaire}}</option>
                        @endforeach
                    </select>
                </div>

                @if ($selectedSurvey>0)
                    <div class="col-span-8 sm:col-span-4 m-md px-2 py-2">
                        <x-jet-label for="questionnaire" value="Veuillez sélectionner une question"/>
                        <select id="questions" class="w-full mt-1 border-gray-300 focus:border-teal-300 focus:ring focus:ring-teal-200 focus:ring-opacity-50 rounded-md shadow-sm transition ease-in-out"
                                autocomplete="off"
                                wire:model="selectedQuestion">
                            <option value="0">Veuillez faire un choix...</option>
                            @foreach ($questions as $question)
                                <option value="{{$question->id}}">{{$question->question}}</option>
                            @endforeach
                        </select>
                    </div>
                @endif

            </form>

            @if ($selectedQuestion>0)
                <a href="{{ route('api.reponse-individuellement', ['id'=>$selectedQuestion]) }}" target="_blank">
                    <div class="mt-3 flex items-center text-sm font-semibold text-teal-700">
                        <div class="bg-teal-300 hover:bg-teal-500 text-lg font-bold py-2 px-4 rounded inline-flex">Consulter le flux {!! $arrow !!}</div>
                    </div>
                </a>
            @endif
        </div>

        <x-jet-section-border />

        <div class="col-span-8 sm:col-span-4 m-md px-2 py-2">
            <h2 class="text-lg font-bold">Réponses par email</h2>

            <div class="col-span-8 sm:col-span-4 m-md px-2 py-2">
                <form>
                    <x-jet-label for="email" value="Veuillez saisir une adresse mail"/>
                    <x-jet-input placeholder="..........@.........." id="email" type="text" class="form-control mt-1" autocomplete="off"/>
                    <div class="mt-3 flex items-center text-sm font-semibold text-teal-700 inline-flex">
                        <div class="bg-teal-300 hover:bg-teal-500 text-lg font-bold py-2 px-4 rounded inline-flex cursor-pointer" wire:click="generateJson(email.value)">Consulter le flux {!! $arrow !!}</div>
                    </div>
                </form>
            </div>

            @if($emailError)
                <h3 class="text-red-500">Veuillez saisir une adresse mail valide !</h3>
            @endif

            <script>
                window.addEventListener('redirect-on-good-email', event => {
                    window.open(event.detail.url);
                })
            </script>

        </div>


    </div>
</div>
