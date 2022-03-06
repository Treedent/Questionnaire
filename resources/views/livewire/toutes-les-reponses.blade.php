<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Toutes les réponses
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
        <div class="overflow-hidden shadow-md sm:rounded-lg mt-6">
            <table class="w-full text-left rounded-lg">
                <thead>
                <tr class="bg-gray-800 text-gray-200 border border-b-0">
                    <th class="px-3 py-3 uppercase">Question</th>
                    <th class="px-3 py-3 uppercase">Date</th>
                    <th class="px-3 py-3 uppercase">Email</th>
                    <th class="px-3 py-3 uppercase">R&eacute;ponse</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($questionsReponses as $rowkey=>$qr)
                        <tr class="w-full {{ $rowkey % 2 == 0 ? 'bg-gray-500 text-gray-200': 'bg-gray-200 text-gray-500' }} whitespace-no-wrap border border-b-0">
                            <td class="px-3 py-3">{{$qr->question->question}}</a></td>
                            <td class="px-3 py-3">{{ \Carbon\Carbon::parse($qr->created_at)->format('d/m/Y H:i:s') }}</td>
                            <td class="px-3 py-3"><a href="mailto:{{$qr->email}}">{{$qr->email}}</a></td>
                            <td class="px-3 py-3 text-justify">{{$qr->reponse}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>



