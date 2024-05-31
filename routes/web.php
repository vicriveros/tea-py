<?php

use Illuminate\Support\Facades\Route;


Route::redirect('/', '/login');

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])
    ->group(function () {
    Route::get('/dashboard', function () { return view('dashboard'); })->name('dashboard');

    Route::get('configuraciones/enfermedades', \App\Livewire\Configuraciones\Enfermedades::class)->name('enfermedades');

    Route::get('usuario/lista', \App\Livewire\Usuario\Index::class)->name('usuarios');
    Route::get('usuario/{id}/edit', \App\Livewire\Usuario\Edit::class)->name('usuario.edit');

    Route::get('persona/lista', \App\Livewire\Persona\Index::class)->name('personas');
    Route::get('persona/{persona}/edit', \App\Livewire\Persona\Edit::class)->name('persona.edit');
    Route::get('persona/create', \App\Livewire\Persona\Edit::class)->name('persona.create');

    Route::get('paciente/lista', \App\Livewire\Paciente\Index::class)->name('pacientes');
    Route::get('paciente/create', \App\Livewire\Paciente\Create::class)->name('paciente.create');
    Route::get('paciente/{paciente}/edit', \App\Livewire\Paciente\Edit::class)->name('paciente.edit');

});