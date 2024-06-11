<?php

namespace App\Livewire\Paciente;

use Livewire\Component;
use App\Models\DesarrollosComunicacionales;
use App\Models\Paciente;

class DesarrolloComunicacional extends Component
{
    public Paciente $paciente;
    public DesarrollosComunicacionales $desarrolloComunicacional;

    public $gorgeo = '';
    public $balbuceo = '';
    public $sonrrisa_social = '';
    public $fija_mirada = '';
    public $com_no = '';
    public $prim_palabras = '';
    public $frases2_palabras = '';
    public $ora_completa = '';
    public $com_ordenes = '';
    public $cum_ordenes = '';
    public $sis_com = '';
    public $se_expresa = '';
    public $se_expresa_como = '';
    public $paciente_id ='';

    public $message = false;

    public function mount(DesarrollosComunicacionales $desarrolloComunicacional, Paciente $pacienteid){
        $this->desarrolloComunicacional = $desarrolloComunicacional;
        $this->paciente = $pacienteid;

        $this->paciente_id = $this->paciente->id;
        $this->gorgeo = $this->desarrolloComunicacional->gorgeo;
        $this->balbuceo = $this->desarrolloComunicacional->balbuceo;
        $this->sonrrisa_social = $this->desarrolloComunicacional->sonrrisa_social;
        $this->fija_mirada = $this->desarrolloComunicacional->fija_mirada;
        $this->com_no = $this->desarrolloComunicacional->com_no;
        $this->prim_palabras = $this->desarrolloComunicacional->prim_palabras;
        $this->frases2_palabras = $this->desarrolloComunicacional->frases2_palabras;
        $this->ora_completa = $this->desarrolloComunicacional->ora_completa;
        $this->com_ordenes = $this->desarrolloComunicacional->com_ordenes;
        $this->cum_ordenes = $this->desarrolloComunicacional->cum_ordenes;
        $this->sis_com = $this->desarrolloComunicacional->sis_com;
        $this->se_expresa = $this->desarrolloComunicacional->se_expresa;
        $this->se_expresa_como = $this->desarrolloComunicacional->se_expresa_como;

    }

    public function rules(){
        return [
            'gorgeo' => ['required'],
            'balbuceo' => ['required'],
            'sonrrisa_social' => ['required'],
            'fija_mirada' => ['required'],
            'com_no' => ['required'],
            'prim_palabras' => ['required'],
            'frases2_palabras' => ['required'],
            'ora_completa' => ['required'],
            'com_ordenes' => ['required'],
            'cum_ordenes' => ['required'],
            'sis_com' => ['required'],
            'se_expresa' => ['required'],
            'se_expresa_como' => ['required'],

        ];
    }

    public function save(){
        $this->validate(); //ejecuta funcion rules

        $this->paciente_id = $this->desarrolloComunicacional->paciente_id;
        $this->gorgeo = $this->desarrolloComunicacional->gorgeo;
        $this->balbuceo = $this->desarrolloComunicacional->balbuceo;
        $this->sonrrisa_social = $this->desarrolloComunicacional->sonrrisa_social;
        $this->fija_mirada = $this->desarrolloComunicacional->fija_mirada;
        $this->com_no = $this->desarrolloComunicacional->com_no;
        $this->prim_palabras = $this->desarrolloComunicacional->prim_palabras;
        $this->frases2_palabras = $this->desarrolloComunicacional->frases2_palabras;
        $this->ora_completa = $this->desarrolloComunicacional->ora_completa;
        $this->com_ordenes = $this->desarrolloComunicacional->com_ordenes;
        $this->cum_ordenes = $this->desarrolloComunicacional->cum_ordenes;
        $this->sis_com = $this->desarrolloComunicacional->sis_com;
        $this->se_expresa = $this->desarrolloComunicacional->se_expresa;
        $this->se_expresa_como = $this->desarrolloComunicacional->se_expresa_como;

        $this->desarrolloComunicacional->save();
        $this->message = true;

    }

    public function render()
    {
        return view('livewire.paciente.desarrollo-comunicacional');
    }
}
