@props([
    'sortable' => false, 
    'column' => null, 
    'sortCol' => null, 
    'sortAsc' => null
    ])

<th {!! $attributes->merge(['class' => 'px-6 bg-blueGray-50 text-blueGray-500 align-middle border border-solid border-blueGray-100 py-3 text-base uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left']) !!} >
    @if($sortable)
        <button wire:click="sortBy('{{ $column }}')" class="flex items-center gap-2">
            {{ $slot }}

                @if ($sortCol === $column)
                    <div class="text-gray-400">
                        @if ($sortAsc)
                            <i class="fa-solid fa-sort-up"></i>
                        @else
                            <i class="fa-solid fa-sort-down"></i>
                        @endif
                    </div>
                @else
                    <div class="text-gray-400 ">
                        <i class="fa-solid fa-sort"></i>
                    </div>
                @endif
        </button> 
    @else
        {{ $slot }}
    @endif

</th>