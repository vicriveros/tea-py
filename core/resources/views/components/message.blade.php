<div
    x-show="$wire.message"
    x-transition.out.opacity.duration.1500ms
    x-effect="if($wire.message) setTimeout(() => $wire.message = false , 1500)" 
    class="flex gap-2 items-center text-green-600 text-base font-medium">
    <i class="fa-solid fa-circle-check"></i> {{ $slot->isEmpty() ? 'Registro Guardado!' : $slot }}
</div>