<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Toutes les réponses
        </h2>
    </x-slot>

    <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">

            <div class="col-span-8 sm:col-span-4 m-md bg-gray-300 px-2 py-2 rounded">
                <x-jet-label for="questionnaire" value="Veuillez sélectionner un questionnaire"/>
                <select id="questionnaire"
                        class="w-full mt-1 border-gray-300 focus:border-teal-300 focus:ring focus:ring-teal-200 focus:ring-opacity-50 rounded-md shadow-sm transition ease-in-out"
                        autocomplete="off"
                        wire:model="choix_questionnaire">
                            <option value="0">Faire un choix...</option>
                            @foreach ($questionnaires as $questionnaire)
                                <option value="{{$questionnaire->id}}">{{$questionnaire->questionnaire}}</option>
                            @endforeach
                </select>
            </div>

            <div class="col-span-6 sm:cols-span-4 text-gray-700 bg-gray-100 rounded mt-1 pt-2">

            </div>






        </div>
    </div>
</x-app-layout>


