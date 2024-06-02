@props(['on'])

<div 
    x-data="{ shown: false, timeout: null }"
    x-init="@this.on('{{ $on }}', () => { clearTimeout(timeout); shown = true; timeout = setTimeout(() => { shown = false }, 2000); })"
    x-show.transition.out.opacity.duration.1500ms="shown"
    x-transition:leave.opacity.duration.1500ms
    style="display: none;"
    {{ $attributes->merge(['class' => 'flex w-96 shadow-lg rounded-lg my-2']) }}
>
    <div class="bg-green-600 py-4 px-6 rounded-l-lg flex items-center">
        <i class="fa-solid fa-check text-white fill-current"></i>
    </div>
    <div class="px-4 py-6 bg-white rounded-r-lg flex justify-between items-center w-full border border-l-transparent border-gray-200">
      <div> {{ $slot->isEmpty() ? 'Saved.' : $slot }} </div>
    </div>
  </div>
