<div class="mt-8 " >
    <a href="{{ route('tv.show',$tvshow['id']) }}">
        <img src="{{ $tvshow['poster_path'] }}" class="hover:opacity-75 transition ease-in-out duration-150 " alt="poster">
    </a>
    <div class="mt-2">
        <a href="{{ route('tv.show',$tvshow['id']) }}" class="text-lg mt-2 hover:text-gray-300">{{ $tvshow['name'] }}</a>
        <div class="flex items-center text-gray-400 text-sm mt-1">
            <span>
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-stars w-4" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffbf00" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                    <path d="M17.8 19.817l-2.172 1.138a0.392 .392 0 0 1 -.568 -.41l.415 -2.411l-1.757 -1.707a0.389 .389 0 0 1 .217 -.665l2.428 -.352l1.086 -2.193a0.392 .392 0 0 1 .702 0l1.086 2.193l2.428 .352a0.39 .39 0 0 1 .217 .665l-1.757 1.707l.414 2.41a0.39 .39 0 0 1 -.567 .411l-2.172 -1.138z" />
                    <path d="M6.2 19.817l-2.172 1.138a0.392 .392 0 0 1 -.568 -.41l.415 -2.411l-1.757 -1.707a0.389 .389 0 0 1 .217 -.665l2.428 -.352l1.086 -2.193a0.392 .392 0 0 1 .702 0l1.086 2.193l2.428 .352a0.39 .39 0 0 1 .217 .665l-1.757 1.707l.414 2.41a0.39 .39 0 0 1 -.567 .411l-2.172 -1.138z" />
                    <path d="M12 9.817l-2.172 1.138a0.392 .392 0 0 1 -.568 -.41l.415 -2.411l-1.757 -1.707a0.389 .389 0 0 1 .217 -.665l2.428 -.352l1.086 -2.193a0.392 .392 0 0 1 .702 0l1.086 2.193l2.428 .352a0.39 .39 0 0 1 .217 .665l-1.757 1.707l.414 2.41a0.39 .39 0 0 1 -.567 .411l-2.172 -1.138z" />
                  </svg>
            </span>
            <span class="mx-2">{{ $tvshow['vote_average']  }}</span>
            <span class="mx-2">|</span>
            <span class="mx-2">{{$tvshow['first_air_date'] }}</span>
        </div>
        <div class="text-gray-400 text-sm">
            {{ $tvshow['genres'] }}
        </div>
    </div>
</div>
