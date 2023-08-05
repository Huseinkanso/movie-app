@extends('layouts.main')

@section('content')
    <div class="mx-auto container px-4 pt-16">
        <div class="popular-shows">
            <h1 class="uppercase tracking-wider text-orange-500 text-lg font-semibold ">Popular shows</h1>
            <div class="grid grid-cols-1   sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5  gap-8  ">
                @foreach ($popularTv as $tvshow )
                <x-tv-card  :tvshow="$tvshow"  />
                @endforeach
            </div>
        </div>
    </div>
    <div class="mx-auto container px-4 pt-16">
        <div class="top-rated-shows">
            <h1 class="uppercase tracking-wider text-orange-500 text-lg font-semibold ">top reted shows </h1>
            <div class="grid grid-cols-1   sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5  gap-8  ">
                @foreach ($topRatedTv as $tvshow )
                    <x-tv-card  :tvshow="$tvshow"  />
                @endforeach
            </div>
        </div>
    </div>
@endsection
