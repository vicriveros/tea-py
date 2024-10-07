<div
    x-show="$wire.message_error"
    x-transition.out.opacity.duration.1500ms
    x-effect="if($wire.message) setTimeout(() => $wire.message = false , 1500)" 
    class="flex gap-2 items-center text-red-600 text-base font-medium">
    <i class="fa-solid fa-triangle-exclamation"></i> {{ $slot->isEmpty() ? 'Algo salio mal!' : $slot }}
</div>