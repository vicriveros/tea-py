<button 
    {{ $attributes->merge(['class' => 'flex justify-center rounded bg-primary p-3 font-medium text-gray hover:bg-opacity-90 place-self-end']) }}
>
    {{ $slot }}
</button>
