<div class="relative text-sm max-w-96 mb-6">
    <div class="absolute pl-1.5 left-0 top-0 bottom-0 flex items-center pointer-events-none text-gray-500">
        <i class="fa-solid fa-magnifying-glass"></i>
    </div>

    <input wire:model.live.debounce.500ms="search" type="text" placeholder="  Buscar..." class="w-full rounded border-[1.5px] border-primary bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary">
</div>

<div class="relative">
    <div class="block w-full overflow-x-auto">
        <table class="items-center bg-transparent w-full border-collapse ">
            {{ $slot }}
        </table>
    </div>
    <div wire:loading class="absolute inset-0 bg-white opacity-50"> </div>
    <div wire:loading.flex class="flex justify-center items-center absolute inset-0 text-black text-xl"> 
        <i class="fa-solid fa-spinner fa-spin-pulse"></i>
    </div>
</div> 