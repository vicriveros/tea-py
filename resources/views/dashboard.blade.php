<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <h1 class="text-title-lg font-bold text-black text-center my-3">
                    Bienvenido a la aplicación TEA PY.
                </h1>
                <p class="text-blueGray-500 text-lg text-center my-3">
                    Para dar de alta a un paciente haga <a href="{{ route('paciente.create') }}" class="text-primary">click aqui.</a>
                </p>
            </div>
        </div>
    </div>
</x-app-layout>
