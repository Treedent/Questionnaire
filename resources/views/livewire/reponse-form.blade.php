<div>
    <div class="bg-gray-100 dark:bg-gray-900 sm:pt-0">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 container">
            <div class="flex justify-between items-center">
                <div class="flex items-center">
                    <div>
                        <a href="/">
                            <svg xmlns="http://www.w3.org/2000/svg" width="100px" height="100px" viewBox="0 0 100 100">
                                <g>
                                    <path fill="#00e3bb" d="M22.335 4.353c18.822-.14 37.66-.058 56.49-.043 5.538.38 7.534 8.4 3.032 11.5-1.705 1.296-3.958 1.373-6.01 1.35-17.298-.03-34.598.02-51.893-.027-2.66.022-5.395-1.397-6.35-3.983-1.735-3.56.86-8.207 4.73-8.797z"/>
                                    <path fill="#ffffff" d="M50.516 27.347c1.548-1.87 4.082-1.725 6.21-1.157 6.064 1.16 11.868 3.97 16.34 8.256 1.8 1.77 4.537 1.104 6.754 1.857 3.05.197 5.43 3.26 5.124 6.247-.287 3.253-1.15 6.447-1.445 9.687 2.32 10.188.155 21.406-6.216 29.76-5.753 7.63-14.764 13.225-24.425 13.695 2.66-4.258 3.07-9.573.552-14 6.47-1.66 12.603-5.86 15.212-12.245 3.12-6.745 2.373-15.05-1.92-21.12-3.393-5.06-9.304-8.113-15.318-8.534-4.367-2.47-4.84-9.367-.87-12.446z"/>
                                    <path fill="#ffffff" d="M16.05 57.79c1.067-15.986 14.554-30.57 30.68-31.832-2.528 4.262-2.906 9.655-.33 13.985-6.883 1.96-13.23 6.9-15.465 13.962-4.492 11.27 3.057 25.56 15.203 27.5 3.816-.053 6.003 4.083 5.806 7.47-.346 3.174-2.725 6.617-6.11 6.853-6.58-.663-12.858-3.535-17.87-7.826-1.656-1.768-4.306-1.378-6.474-1.944-2.873-.04-5.842-1.848-6.417-4.794-.33-4.252 1.304-8.353 1.392-12.588-.292-3.59-1.2-7.197-.416-10.786z"/>
                                </g>
                            </svg>
                        </a>
                    </div>
                    <div>
                        <h1 class="text-white text-2xl">Questionnaire</h1>
                    </div>
                </div>
                <div>
                    @auth
                        <a href="{{ url('/dashboard') }}" class="bg-teal-300 hover:bg-teal-500 text-lg font-bold py-2 px-4 rounded">Administration</a>
                    @else
                        <a href="{{ route('login') }}" class="bg-teal-300 hover:bg-teal-500 text-lg font-bold py-2 px-4 rounded">Administration</a>
                    @endauth
                </div>
            </div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

        <x-jet-banner />

        <div class="container mx-auto ml-4 mt-6 mb-4">
            <h3 class="text-xl text-gray-800 leading-tight">
                {{ $topMessage }}
            </h3>
        </div>

        <x-jet-form-section submit="validateForm" class="bg-gray-200 p-3 rounded shadow-xl">

            <x-slot name="title">{{ $questionnaire->questionnaire }}</x-slot>
            <x-slot name="description">{{ $questionnaire->description }}</x-slot>

            <x-slot name="form">

                <x-jet-input id="escobar" type="text" class="hidden" wire:model="reponseform.escobar" autocomplete="off"/>

                @foreach($questions as $question)
                    <div class="col-span-6 sm:cols-span-4 text-gray-700 bg-gray-100 rounded mt-1 pt-2">
                        @php $answer_id = 'reponse_' . $loop->iteration @endphp
                        <x-jet-label for="{{ $answer_id }}" value="{{ $question->question }}"/>
                        <textarea id="{{ $answer_id }}" placeholder="Votre réponse"
                                  class="w-full border-gray-300 focus:border-teal-300 focus:ring focus:ring-teal-200 focus:ring-opacity-50 rounded-md shadow-sm transition ease-in-out"
                                  wire:model.lazy="reponseform.{{ $answer_id }}" rows="4"></textarea>
                        <x-jet-input-error for="{{ $answer_id }}" class="mt-1" />
                    </div>
                @endforeach

                <div class="col-span-6 sm:cols-span-4 text-gray-700 bg-gray-100 rounded mt-1 pt-2">
                    <x-jet-label for="email_1" value="Votre adresse mail"/>
                    <x-jet-input placeholder="..........@.........." id="email_1" type="text" class="form-control w-full mt-1" wire:model.lazy="reponseform.email_1" autocomplete="off"/>
                    <x-jet-input-error for="email_1" class="mt-1" />
                </div>

                <div class="col-span-6 sm:cols-span-4 text-gray-700 bg-gray-100 rounded mt-1 pt-2">
                    <x-jet-label for="email_1" value="Confirmez votre adresse mail"/>
                    <x-jet-input placeholder="..........@.........." id="email_2" type="text" class="form-control w-full mt-1" wire:model.lazy="reponseform.email_2" autocomplete="off"/>
                    <x-jet-input-error for="email_2" class="mt-1" />
                </div>
            </x-slot>

            <x-slot name="actions">
                <div class="bg-gray-100 px-2 py-2 rounded">
                    <x-jet-button wire:loading.attr="enabled">Envoyer</x-jet-button>
                </div>
            </x-slot>

        </x-jet-form-section>
    </div>

    <div class="mt-8 p-2 bg-gray-100 dark:bg-gray-900 sm:pb-0">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-center sm:items-center sm:justify-between">
                <div class="text-center text-sm text-gray-500 sm:text-left">
                    <div class="flex items-center">
                        Régis TEDONE &copy;{{date("Y")}}
                    </div>
                </div>
                <div class="ml-4 text-center text-sm text-gray-500 sm:text-right sm:ml-0">
                    <button onclick="this.blur();window.scrollTo({ top: 0, behavior: 'smooth' });" title="Vers le haut">
                        <svg width="15px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><path fill="#f7fafc" d="M374.6 246.6C368.4 252.9 360.2 256 352 256s-16.38-3.125-22.62-9.375L224 141.3V448c0 17.69-14.33 31.1-31.1 31.1S160 465.7 160 448V141.3L54.63 246.6c-12.5 12.5-32.75 12.5-45.25 0s-12.5-32.75 0-45.25l160-160c12.5-12.5 32.75-12.5 45.25 0l160 160C387.1 213.9 387.1 234.1 374.6 246.6z"/></svg>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
