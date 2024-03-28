<?php

namespace App\Livewire\Usuario;

use App\Models\User;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Spatie\Permission\Models\Role;

class Edit extends Component
{
    // Publicar variables a ser usadas en el form
    public User $user;

    #[Validate] // Agrega validacion al input. Corre lo que esta en la funcion rules, for realtime validation
    public $username = '';
    #[Validate]
    public $email ='';
    public $user_rol ='';

    public $message = false;

    // Asignar valor a las variables
    public function mount($id){
        $this->user = User::find($id);

        $this->username = $this->user->name;
        $this->email = $this->user->email;
        $this->user_rol = $this->user->roles->pluck('name')[0] ?? '';
    }

    public function rules(){
        return [
            'username' => ['required'],
            'email' => ['required'],
        ];
    }

    public function update(){
        $this->validate(); //ejecuta funcion rules

        $this->user->name = $this->username;
        $this->user->email = $this->email;
        $this->user->syncRoles([$this->user_rol]);

        $this->user->save();
        sleep(1);
        $this->message = true;
    }

    public function render()
    {
        return view('livewire.usuario.edit', ['roles' => Role::all()]);
    }
}
