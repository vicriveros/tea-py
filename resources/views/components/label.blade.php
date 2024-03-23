@props(['value'])

<label {{ $attributes->merge(['class' => 'mb-3 block text-sm font-medium text-black']) }}>
    {{ $value ?? $slot }}
</label>
