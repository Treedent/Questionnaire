<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Réponses par email
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">

        <div class="col-span-8 sm:col-span-4 m-md px-2 py-2">
            <x-jet-label for="email" value="Veuillez saisir une adresse mail"/>
            <x-jet-input placeholder="..........@.........." id="email" type="text" class="form-control mt-1" wire:model.lazy="email" autocomplete="off"/>
            <x-jet-button wire:loading.attr="enabled" class="flex-inline" wire:click="filterByEmail(email.value)">Chercher</x-jet-button>
        </div>

        @if($emailError)
            <h3 class="text-red-500">Veuillez saisir une adresse mail valide !</h3>
        @endif

        @if(isset($questionReponses))

            <div class="col-span-8 sm:col-span-4 m-md px-2 py-2">
                <h3>R&eacute;ponses de : {{ $questionReponses[0]->email }}</h3>
            </div>

            <div class="overflow-hidden shadow-md sm:rounded-lg mt-6">
                <table class="w-full text-left rounded-lg">
                    <thead>
                    <tr class="bg-gray-800 text-gray-200 border border-b-0">
                        <th class="px-3 py-3 uppercase">Question</th>
                        <th class="px-3 py-3 uppercase">Date</th>
                        <th class="px-3 py-3 uppercase">R&eacute;ponse</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($questionReponses as $rowkey=>$qr)
                        <tr class="w-full {{ $rowkey % 2 == 0 ? 'bg-gray-500 text-gray-200': 'bg-gray-200 text-gray-500' }} whitespace-no-wrap border border-b-0">
                            <td class="px-3 py-3">{{$qr->question->question}}</a></td>
                            <td class="px-3 py-3">{{ \Carbon\Carbon::parse($qr->created_at)->format('d/m/Y H:i:s') }}</td>
                            <td class="px-3 py-3 text-justify">{{$qr->reponse}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        @endif


    </div>
</div>
