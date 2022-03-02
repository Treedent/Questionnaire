<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Merci pour votre contribution</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="{{ asset('css/nunito.css') }}">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        <link rel="stylesheet" href="{{ mix('css/animated-text.css') }}">

        <!-- Favicons -->
        @include('favicons')

    </head>
    <body class="antialiased">
        <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
            @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Administration</a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Administration</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
                <div class="flex justify-center pt-8 sm:pt-0">
                    <figure style="width:80px;height:80px">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100">
                            <g>
                                <path fill="#00e3bb" d="M22.335 4.353c18.822-.14 37.66-.058 56.49-.043 5.538.38 7.534 8.4 3.032 11.5-1.705 1.296-3.958 1.373-6.01 1.35-17.298-.03-34.598.02-51.893-.027-2.66.022-5.395-1.397-6.35-3.983-1.735-3.56.86-8.207 4.73-8.797z"/>
                                <path fill="#ffffff" d="M50.516 27.347c1.548-1.87 4.082-1.725 6.21-1.157 6.064 1.16 11.868 3.97 16.34 8.256 1.8 1.77 4.537 1.104 6.754 1.857 3.05.197 5.43 3.26 5.124 6.247-.287 3.253-1.15 6.447-1.445 9.687 2.32 10.188.155 21.406-6.216 29.76-5.753 7.63-14.764 13.225-24.425 13.695 2.66-4.258 3.07-9.573.552-14 6.47-1.66 12.603-5.86 15.212-12.245 3.12-6.745 2.373-15.05-1.92-21.12-3.393-5.06-9.304-8.113-15.318-8.534-4.367-2.47-4.84-9.367-.87-12.446z"/>
                                <path fill="#ffffff" d="M16.05 57.79c1.067-15.986 14.554-30.57 30.68-31.832-2.528 4.262-2.906 9.655-.33 13.985-6.883 1.96-13.23 6.9-15.465 13.962-4.492 11.27 3.057 25.56 15.203 27.5 3.816-.053 6.003 4.083 5.806 7.47-.346 3.174-2.725 6.617-6.11 6.853-6.58-.663-12.858-3.535-17.87-7.826-1.656-1.768-4.306-1.378-6.474-1.944-2.873-.04-5.842-1.848-6.417-4.794-.33-4.252 1.304-8.353 1.392-12.588-.292-3.59-1.2-7.197-.416-10.786z"/>
                            </g>
                        </svg>
                    </figure>
                </div>

                <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">

                    <div class="p-3" id="text-animation">
                        <svg viewBox="0 0 600 100">
                            <!-- Symbol-->
                            <symbol id="s-text">
                                <text text-anchor="middle" x="50%" y="50%" dy=".35em">MERCI</text>
                            </symbol>
                            <!-- Duplicate symbols-->
                            <use class="text" xlink:href="#s-text"></use>
                            <use class="text" xlink:href="#s-text"></use>
                            <use class="text" xlink:href="#s-text"></use>
                            <use class="text" xlink:href="#s-text"></use>
                            <use class="text" xlink:href="#s-text"></use>
                        </svg>
                    </div>

                    <div class="flex justify-center pt-8 sm:pt-0 mb-6">
                        <a href="/" class="bg-teal-300 hover:bg-teal-500 text-lg font-bold py-2 px-4 rounded">
                                Accueil
                        </a>
                    </div>

                </div>

                <div class="flex justify-center mt-4 sm:items-center sm:justify-between">
                    <div class="text-center text-sm text-gray-500 sm:text-left">
                        <div class="flex items-center">
                            Régis TEDONE &copy; {{ now()->year }}
                        </div>
                    </div>

                    <div class="ml-4 text-center text-sm text-gray-500 sm:text-right sm:ml-0">
                        Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
