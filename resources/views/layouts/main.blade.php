<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>movie app</title>
    @vite('resources/css/app.css')
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    @livewireStyles
</head>
<body class="font-sans bg-gray-900 text-white ">

    <nav class="border-b border-gray-800">
        <div class="container px-4 mx-auto flex flex-col md:flex-row items-center justify-around px-4 py-6">
            <ul class="flex items-center md:flex-row flex-col">
                <li>
                    <a href="{{ route('movies.index') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon inline-block w-32 icon-tabler icon-tabler-movie" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                            <rect x="4" y="4" width="16" height="16" rx="2" />
                            <line x1="8" y1="4" x2="8" y2="20" />
                            <line x1="16" y1="4" x2="16" y2="20" />
                            <line x1="4" y1="8" x2="8" y2="8" />
                            <line x1="4" y1="16" x2="8" y2="16" />
                            <line x1="4" y1="12" x2="20" y2="12" />
                            <line x1="16" y1="8" x2="20" y2="8" />
                            <line x1="16" y1="16" x2="20" y2="16" />
                          </svg>
                          movieApp
                    </a>

                </li>
                <li class="md:ml-8">
                    <a href="{{ route('movies.index') }}" class="hover:text-gray-300">
                        movies
                    </a>
                </li>
                <li class="md:ml-8 my-1">
                    <a href="{{ route('tv.index') }}" class="hover:text-gray-300">
                        tv shows
                    </a>
                </li>
                <li class="md:ml-8 my-1">
                    <a href="{{ route('actors.index') }}" class="hover:text-gray-300">
                        Actors
                    </a>
                </li>
            </ul>
            <div class="flex items-center ">
                <livewire:search-dropdown >
                <div class="ml-4">
                    <a href="#">
                        <img src="/img/yearly1.jpg" class="rounded-full w-8" alt="">
                    </a>
                </div>
            </div>
        </div>

    </nav>
    @yield('content')
    @livewireScripts
    @yield('scripts')
</body>
</html>
