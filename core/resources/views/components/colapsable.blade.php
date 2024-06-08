@props([
    'id' => 1, 
    'title' => 'Some Title'
    ])

<div id="collapsible_pane" class=" w-full rounded-sm border border-stroke bg-white shadow-default mb-2">
    <div class=" w-full px-3 py-1.5 rounded-sm border border-stroke bg-white shadow-default !text-black flex justify-between items-center relative">
        <div><span class=" text-base font-semibold no-underline">{{ $title }}</span></div>
        <div>
            <div class="flex flex-col"> 
                <div><span class=" text-xs transition duration-500 ease-in-out !text-black !no-underline coll-pan-id{{ $id }}_label">expandir</span></div>
                <div class="flex justify-center -mt-1"><i class=" fa-solid fa-caret-down text-xl font-semibold transition duration-500 ease-in-out !text-black !no-underline coll-pan-id{{ $id }}_arrow" aria-hidden="true" style="transform: rotate(0deg);"></i> </div>
            </div>
        </div>
        <button type="button" id="coll-pan-id{{ $id }}" class=" absolute top-0 left-0 w-full h-full bg-transparent " data-toggle="collapsible_pane" data-target=".coll-pan-id{{ $id }}" aria-controls="coll-pan-id{{ $id }}" aria-expanded="false" title="{{ $title }}"></button>
    </div>
    <div class=" text-black block h-auto max-h-0 overflow-hidden transition-max-height duration-500 ease-in-out coll-pan-id{{ $id }}" style="max-height: 0px;">
        <div class=" px-2 py-2"><br>
            {{ $slot}}
        </div>
    </div>
</div>

    