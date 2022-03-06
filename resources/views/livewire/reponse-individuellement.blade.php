<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Réponse individuellement
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">

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
            <div class="overflow-hidden shadow-md sm:rounded-lg mt-6">
                <table class="w-full text-left rounded-lg">
                    <thead>
                    <tr class="bg-gray-800 text-gray-200 border border-b-0">
                        <th class="px-3 py-3 uppercase">Date</th>
                        <th class="px-3 py-3 uppercase">Email</th>
                        <th class="px-3 py-3 uppercase">R&eacute;ponse</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($reponses as $rowkey=>$reponse)
                        <tr class="w-full {{ $rowkey % 2 == 0 ? 'bg-gray-500 text-gray-200': 'bg-gray-200 text-gray-500' }} whitespace-no-wrap border border-b-0">
                            <td class="px-3 py-3">{{ \Carbon\Carbon::parse($reponse->created_at)->format('d/m/Y H:i:s') }}</td>
                            <td class="px-3 py-3"><a href="mailto:{{$reponse->email}}">{{$reponse->email}}</a></td>
                            <td class="px-3 py-3 text-justify">{{$reponse->reponse}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
</div>



