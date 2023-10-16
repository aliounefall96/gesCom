<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\StaticData;

class StaticDatas extends Component
{
    public $data = [
        'icon' => 'fas fa-database',
        'title' => 'Données Statiques',
        'subtitle' => 'Liste des données statiques'
    ];

    public $form = [
        'type' => '',
            'valeur' => ''
    ];

    public $etat = 'list';

    protected $rules =[
        'form.type' => 'required',
        'form.valeur' => 'required',
    ];

    protected $messages = [
        'form.type.required' => 'Type requis.',
        'form.valeur.required' => 'Valeur requis.',
    ];

    public function removeSpace($value)
    {
        $tab = explode(' ', $value);

        return implode("_", $tab);
    }

    public function addNew($type = "test")
    {
        $this->etat = 'add';
        $this->data['subtitle'] = 'Ajout donnée statique';
        $this->form['type'] = $type;
    }

    public function addStaticData()
    {
        $this->validate();

        dd($this->form);
    }

    public function retour()
    {
        $this->etat = 'list';
    }


    public function render()
    {

        $staticDatas = StaticData::all()->groupBy('type');

        return view('livewire.static-datas', [
            'page' => 'staticData',
            'staticDatas' => $staticDatas,
        ])
        ->layout('layouts.app');
    }
}
