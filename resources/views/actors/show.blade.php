@extends('layouts.main')

@section('content')
<div class="movie-info border-b border-gray-800">
    <div class="container mx-auto px-4 py-16 flex flex-col md:flex-row">
        <div class="flex-none">
            <img src="{{ $actor['profile_path'] }}" class="md:w-96 md-64 " alt="">
            <ul class="flex flex-row items-center mt-4">
                @if($social['facebook'])
                <li>
                    <a href="{{ $social['facebook'] }}" title="facebook">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-7 icon icon-tabler icon-tabler-brand-facebook" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                            <path d="M7 10v4h3v7h4v-7h3l1 -4h-4v-2a1 1 0 0 1 1 -1h3v-4h-3a5 5 0 0 0 -5 5v2h-3" />
                          </svg>
                    </a>
                </li>
                @endif
                @if($social['instagram'])
                <li>
                    <a href="{{ $social['instagram'] }}" title="instagram">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-7 icon icon-tabler icon-tabler-brand-instagram" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                            <rect x="4" y="4" width="16" height="16" rx="4" />
                            <circle cx="12" cy="12" r="3" />
                            <line x1="16.5" y1="7.5" x2="16.5" y2="7.501" />
                          </svg>
                    </a>
                </li>
                @endif
                @if($social['twitter'])
                <li>
                    <a href="{{ $social['twitter'] }}" title="twitter">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-7 icon icon-tabler icon-tabler-brand-twitter" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                            <path d="M22 4.01c-1 .49 -1.98 .689 -3 .99c-1.121 -1.265 -2.783 -1.335 -4.38 -.737s-2.643 2.06 -2.62 3.737v1c-3.245 .083 -6.135 -1.395 -8 -4c0 0 -4.182 7.433 4 11c-1.872 1.247 -3.739 2.088 -6 2c3.308 1.803 6.913 2.423 10.034 1.517c3.58 -1.04 6.522 -3.723 7.651 -7.742a13.84 13.84 0 0 0 .497 -3.753c-.002 -.249 1.51 -2.772 1.818 -4.013z" />
                          </svg>
                    </a>
                </li>
                @endif
                @if($actor['homepage'])
                <li>
                    <a href="{{$actor['homepage']  }}" title="website">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-7 icon icon-tabler icon-tabler-ball-football" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                            <circle cx="12" cy="12" r="9" />
                            <path d="M12 7l4.76 3.45l-1.76 5.55h-6l-1.76 -5.55z" />
                            <path d="M12 7v-4m3 13l2.5 3m-.74 -8.55l3.74 -1.45m-11.44 7.05l-2.56 2.95m.74 -8.55l-3.74 -1.45" />
                          </svg>
                    </a>
                </li>
                @endif
            </ul>
        </div>
        <div class="md:ml-24">
            <h2 class="text-4xl mt-4 md:mt-0 font-semibold">{{ $actor['name'] }}</h2>
            <div class="flex flex-wrap items-center text-gray-400 text-sm">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 icon icon-tabler icon-tabler-gift" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ff9300" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                    <rect x="3" y="8" width="18" height="4" rx="1" />
                    <line x1="12" y1="8" x2="12" y2="21" />
                    <path d="M19 12v7a2 2 0 0 1 -2 2h-10a2 2 0 0 1 -2 -2v-7" />
                    <path d="M7.5 8a2.5 2.5 0 0 1 0 -5a4.8 8 0 0 1 4.5 5a4.8 8 0 0 1 4.5 -5a2.5 2.5 0 0 1 0 5" />
                  </svg>
                <span class="ml-1"> {{ $actor['birthday'] }} ({{ $actor['age'] }}  years old  {{  $actor['place_of_birth'] }}) </span>
            </div>

            <p class="text-gray-300 mt-8">
               {{ $actor['biography'] }}
            </p>
            <h4 class="font-semiblod mt-12">known for</h4>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-8 ">
                @foreach ($knownForMovies as $movie)

                <div class="mt-4">
                    <a href="{{ $movie['linkToPage'] }}">
                        <img class=""  src="{{ $movie['poster_path'] }}" alt="">
                    </a>
                    <a href="{{ $movie['linkToPage'] }}">
                        {{ $movie['title'] }}
                    </a>
                </div>
                @endforeach

            </div>
        </div>
    </div>
</div> <!-- end movie-info -->

<div class="credits border-b border-gray-800">
    <div class="container mx-auto px-4 py-16">
        <h2 class="text-4xl font-semibold">Credits</h2>
        <ul class="list-disc leading-loose pl-5 mt-8">
            @foreach ($credits as $credit)
            <li>{{ $credit['release_year'] }} &middot; <strong>{{ $credit['title'] }}</strong> as {{ $credit['character'] }}  </li>

            @endforeach
        </ul>
    </div>
</div> <!-- end movie-cast -->


 <!-- end movie-images -->
@endsection
