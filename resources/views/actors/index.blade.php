@extends('layouts.main')

@section('content')
    <div class="mx-auto container px-4 py-16">
        <div class="popular-actors">
            <h1 class="uppercase tracking-wider text-orange-500 text-lg font-semibold ">Popular actors</h1>
            <div class="grid grid-cols-1   sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5  gap-8  ">
                @foreach ($popularActors as $actor)
                <div class="actor mt-8">
                    <a href="{{ route('actors.show',$actor['id']) }}">
                        <img src="{{$actor['profile_path'] }}" alt="" class="hover:opacity-75 transition ease-in-out duration-150">
                    </a>
                    <div class="mt-2">
                        <a href="{{ route('actors.show',$actor['id']) }}" class="text-lg hover:text-gray-300">{{ $actor['name'] }}</a>
                        <div class="text-sm truncate text-gray-400">{{ $actor['known_for'] }}</div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </div>

    {{-- <div class="flex justify-between mx-8 my-16">
        @if ($previous)
        <a href="/actors/page/{{ $previous }}">prev</a>
        @else
        <div></div>
        @endif

        @if ($next)
        <a href="/actors/page/{{ $next }}">next</a>
        @else
        <div></div>
        @endif

    </div> --}}
    <div class="page-load-status my-8 mx-7">
        <div class="flex justify-center">
            <p class="infinite-scroll-request spinner text-4xl"></p>
        </div>
        <p class="infinite-scroll-last">End of content</p>
        <p class="infinite-scroll-error">No more pages to load</p>
      </div>
@endsection

@section('scripts')
<script src="https://unpkg.com/infinite-scroll@4/dist/infinite-scroll.pkgd.min.js"></script>
<script>

let elem = document.querySelector('.grid');
let infScroll = new InfiniteScroll( elem, {
  // options
  path: function() {
  return '/actors/page/' + (this.pageIndex + 1);
    },
  append: '.actor',
  status: '.page-load-status'
});

</script>
@endsection
