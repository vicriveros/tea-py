<?php

use Illuminate\Support\Facades\Route;
use Livewire\Livewire;

Route::redirect('/', '/app/login'); //esta config es para el server de produccion. 
// Para desarrollo en local se puede corregir la redireccion a '/login'. Volver a poner como estaba antes de hacer commit.
 
Livewire::setScriptRoute(function ($handle) {
    return Route::get('/app/livewire/livewire.js', $handle);
});

Livewire::setUpdateRoute(function ($handle) {
    return Route::post('/app/livewire/update', $handle);
});

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])
    ->group(function () {
    Route::get('dashboard', \App\Livewire\Dashboard::class)->name('dashboard');


    Route::get('configuraciones/enfermedades', \App\Livewire\Configuraciones\Enfermedades::class)->name('enfermedades');
    Route::get('configuraciones/tratamientos', \App\Livewire\Configuraciones\Tratamientos::class)->name('tratamientos');
    Route::get('configuraciones/aspectos', \App\Livewire\Configuraciones\Aspectos::class)->name('aspectos');
    Route::get('configuraciones/conductas', \App\Livewire\Configuraciones\Conductas::class)->name('conductas');
    Route::get('configuraciones/especialidades', \App\Livewire\Configuraciones\Especialidades::class)->name('especialidades');
    Route::get('configuraciones/consultorios', \App\Livewire\Configuraciones\Consultorios::class)->name('consultorios');

    Route::get('usuario/lista', \App\Livewire\Usuario\Index::class)->name('usuarios');
    Route::get('usuario/{id}/edit', \App\Livewire\Usuario\Edit::class)->name('usuario.edit');

    Route::get('persona/lista', \App\Livewire\Persona\Index::class)->name('personas');
    Route::get('persona/{persona}/edit', \App\Livewire\Persona\Edit::class)->name('persona.edit');
    Route::get('persona/create', \App\Livewire\Persona\Edit::class)->name('persona.create');

    Route::get('paciente/lista', \App\Livewire\Paciente\Index::class)->name('pacientes');
    Route::get('paciente/create', \App\Livewire\Paciente\Create::class)->name('paciente.create');
    Route::get('paciente/{paciente}/edit', \App\Livewire\Paciente\Edit::class)->name('paciente.edit');

    Route::get('medico/lista', \App\Livewire\Medico\Index::class)->name('profesionales');
    Route::get('medico/create', \App\Livewire\Medico\Create::class)->name('profesional.create');
    Route::get('medico/{medico}/edit', \App\Livewire\Medico\Edit::class)->name('profesional.edit');

    Route::get('agendamiento/calendario/{consultorio}', \App\Livewire\Agendamiento\Calendario::class)->name('agendamiento.calendario');
    Route::get('agendamiento/consultorios', \App\Livewire\Agendamiento\Consultorios::class)->name('agendamiento.consultorios');
    Route::get('agendamiento/agenda', \App\Livewire\Agendamiento\Agenda::class)->name('agendamiento.agenda');

});