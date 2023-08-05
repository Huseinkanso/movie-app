@extends('layouts.main')

@section('content')
    <div class="mx-auto container px-4 pt-16">
        <div class="popular-movies">
            <h1 class="uppercase tracking-wider text-orange-500 text-lg font-semibold ">Popular movies</h1>
            <div class="grid grid-cols-1   sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5  gap-8  ">
                @foreach ($popularMovies as $movie )
                <x-movie-card  :movie="$movie"  />
                @endforeach
            </div>
        </div>
    </div>
    <div class="mx-auto container px-4 pt-16">
        <div class="now-playing">
            <h1 class="uppercase tracking-wider text-orange-500 text-lg font-semibold ">now playing</h1>
            <div class="grid grid-cols-1   sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5  gap-8  ">
                @foreach ($nowPlayingMovies as $movie )
                    <x-movie-card  :movie="$movie"  />
                @endforeach
            </div>
        </div>
    </div>
@endsection
