<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        <script src="https://kit.fontawesome.com/4c657afdc9.js" crossorigin="anonymous"></script>
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Styles -->
        @livewireStyles
    </head>
    <body x-data="{ page: 'dashboard', 'sidebarToggle': false, 'scrollTop': false }" class="font-sans antialiased relative z-1 bg-whiten font-satoshi text-base font-normal text-body">
        <!-- <x-banner /> -->

        <div class="flex h-screen overflow-hidden">
            <livewire:sidebar />

            <div class="relative flex flex-1 flex-col overflow-y-auto overflow-x-hidden">
                <livewire:header />

                <!-- Page Content -->
                <main class="p-6.5">
                    {{ $slot }}
                </main>
            </div>
        </div>

        @stack('modals')

        @livewireScripts
    </body>
</html>
