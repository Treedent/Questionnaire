<div class="p-6 sm:px-20 bg-white border-b border-gray-200">
    <div>
        <x-jet-application-logo class="block h-12 w-auto" />
    </div>

    <div class="mt-8 text-2xl">
        Consultation des réponses aux questionnaires.
    </div>

    <div class="mt-6 text-gray-500">
    </div>
</div>

@php
    $book = '<svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-8 h-8 text-gray-400"><path d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>';
    $arrow = '<span class="mt-2 ml-2"><svg viewBox="0 0 20 20" fill="currentColor" class="w-4 h-4"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg></span>';
@endphp

<div class="bg-gray-200 bg-opacity-25 grid grid-cols-1 md:grid-cols-2">
    <div class="p-6">
        <div class="flex items-center">
            {!! $book !!}
            <div class="ml-4 text-lg text-gray-600 leading-7 font-semibold">Consulter toutes les réponses</div>
        </div>

        <div class="ml-12">
            <div class="mt-2 text-sm text-gray-500"></div>

            <a href="{{ route('toutes-les-reponses') }}">
                <div class="mt-3 flex items-center text-sm font-semibold text-teal-700">
                    <div class="bg-teal-300 hover:bg-teal-500 text-lg font-bold py-2 px-4 rounded inline-flex">J'y vais {!! $arrow !!}</div>
                </div>
            </a>
        </div>
    </div>

    <div class="p-6 border-t border-gray-200 md:border-t-0 md:border-l">
        <div class="flex items-center">
            {!! $book !!}
            <div class="ml-4 text-lg text-gray-600 leading-7 font-semibold">Consulter les réponses individuellement</div>
        </div>

        <div class="ml-12">
            <div class="mt-2 text-sm text-gray-500"></div>

            <a href="{{ route('reponse-individuellement') }}">
                <div class="mt-3 flex items-center text-sm font-semibold text-teal-700">
                    <div class="bg-teal-300 hover:bg-teal-500 text-lg font-bold py-2 px-4 rounded inline-flex">J'y vais {!! $arrow !!}</div>
                </div>
            </a>
        </div>
    </div>

    <div class="p-6 border-t border-gray-200">
        <div class="flex items-center">
            {!! $book !!}
            <div class="ml-4 text-lg text-gray-600 leading-7 font-semibold">Consulter les réponses par adresse mail</div>
        </div>

        <div class="ml-12">
            <div class="mt-2 text-sm text-gray-500"></div>
            <a href="{{ route('reponse-par-email') }}">
                <div class="mt-3 flex items-center text-sm font-semibold text-teal-700">
                    <div class="bg-teal-300 hover:bg-teal-500 text-lg font-bold py-2 px-4 rounded inline-flex">J'y vais {!! $arrow !!}</div>
                </div>
            </a>
        </div>
    </div>

    <div class="p-6 border-t border-gray-200 md:border-l">
        <div class="flex items-center"></div>

        <div class="ml-12">
            <div class="mt-2 text-sm text-gray-500"></div>
        </div>
    </div>
</div>
