@props(['for'])

@error($for)
    <p {{ $attributes->merge(['class' => 'text-sm text-red-600']) }}>
        {{ $slot->isEmpty() ? $message : $slot }}
    </p>
@enderror
