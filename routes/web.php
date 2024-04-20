<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])
    ->group(function () {
    Route::get('/dashboard', function () {
         return view('dashboard');
    })->name('dashboard');
});

Route::middleware([ 'auth:sanctum', config('jetstream.auth_session'), 'verified',])
    ->group(function () {
        Route::get('usuario/lista', \App\Livewire\Usuario\Index::class)->name('usuarios');
});

Route::middleware([ 'auth:sanctum', config('jetstream.auth_session'), 'verified',])
    ->group(function () {
        Route::get('usuario/{id}/edit', \App\Livewire\Usuario\Edit::class)->name('usuario.edit');
});
