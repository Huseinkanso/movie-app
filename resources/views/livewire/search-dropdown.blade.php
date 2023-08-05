<div class="relative" x-data="{ isOpen:true }" @click.away="isOpen=false">
    <input type="text"
     wire:model.debounce.500ms="search"
     class="bg-gray-800 rounded-full w-64 pl-8 py-1 focus:outline-none focus:shadow"
      placeholder="search"
      @keydown="isOpen=true"
      @focus="isOpen=true"
      x-ref="search"
      @keydown.window="
        if (event.KeyCode==191)
        {
            $refs.search.focus();
        }
      "
      @keydown.escape.window="isOpen=false"
      @keydown.shift.tab="isOpen=false"  {{-- this is when we leave focus but not by clicking outside --}}
    >
    <div class="absolute -top-1.5 left-3">
        <svg xmlns="http://www.w3.org/2000/svg" class="fill-current w-4   text-gray-500 icon icon-tabler icon-tabler-search" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
            <circle cx="10" cy="10" r="7" />
            <line x1="21" y1="21" x2="15" y2="15" />
          </svg>
    </div>
    {{-- loading mean it will still load until any request finish --}}
    <div wire:loading class="spinner top-4 right-2 "></div>
    @if (strlen($search)>2)
    <div class="absolute bg-gray-800 rounded w-64 mt-4 z-50"
     x-show.transition.opacity="isOpen"

      >
        @if (count($searchResult)>0)

        <ul class="">
            @foreach ($searchResult as $result)
            <li class="border-b text-sm  border-gray-700 ">
                <a
                 href="{{ route('movies.show',$result['id']) }}"
                 class="block hover:bg-gray-700 transition ease-in-out duration-75 px-3 py-3 flex items-center justify-between"
                 @if($loop->last)
                    @keydown.tab="isOpen=false"
                 @endif
                 >
                    {{ $result['title'] }}

                    @if ($result['poster_path'])
                    <img src="https://image.tmdb.org/t/p/w92/{{ $result['poster_path'] }}" alt="" class="w-8">
                    @else
                    <img src="https://via.placeholder.com/50x75" alt="poster" class="w-8">
                    @endif
                </a>
            </li>
            @endforeach
        </ul>
        @else
        <ul class="">

            <li class="border-b text-sm  border-gray-700 ">
                <a href="#" class="block hover:bg-gray-700 transition ease-in-out duration-75 px-3 py-3 ">
                    <span class="ml-4">
                        no result for {{ $search }}
                    </span>

                </a>
            </li>

        </ul>
        @endif
    </div>
    @endif
</div>
