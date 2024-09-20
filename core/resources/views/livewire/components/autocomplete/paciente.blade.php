<div x-data="{ selected: 0, open: true }" class="relative">
    <!-- Autocomplete Input -->
    <input 
        type="text" 
        wire:model.live.debounce.300ms="query" 
        @keydown.down.prevent="selected = Math.min(selected + 1, {{ count($results) - 1 }}); $wire.moveHighlight('down')" 
        @keydown.up.prevent="selected = Math.max(selected - 1, 0); $wire.moveHighlight('up')" 
        @keydown.enter.prevent="$wire.selectHighlighted()" 
        @focus="open = true" 
        @blur="setTimeout(() => open = false, 100)" 
        placeholder="Buscar paciente..." 
        class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter"
    />

    <!-- Show results if there are any -->
    @if(!empty($results))
        <ul x-show="open" class="absolute bg-white border border-gray-300 w-full mt-1 max-h-60 overflow-y-auto z-10">
            @foreach($results as $index => $result)
                <li 
                    wire:click="selectResult('{{$result['nombre']}}', '{{$result['apellido']}}', '{{$result['documento']}}', '{{$result['id']}}')" 
                    class="p-2 cursor-pointer hover:bg-gray-200"
                    :class="{
                        'bg-primary': selected === {{ $index }},
                        'text-white': selected === {{ $index }}
                        }"
                >
                    {{ $result['nombre'] .' '. $result['apellido'] .' - '. $result['documento']}}
                </li>
            @endforeach
        </ul>
    @endif

</div>