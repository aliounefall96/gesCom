<?php

namespace App\Http\Livewire;

use App\Models\Astuce;
use App\Models\Reunion;
use Livewire\Component;

use DateTime;

class Reunions extends Component
{
    public $data = [
        'icon' => 'fa fa-handshake',
        'title' => 'Réunions',
        'subtitle' => 'Liste des réunions',
    ];

    public $histo;
    public $etat = 'list';

    public $form = [
        'title' => '',
        'date' => null,
        'description' => '',
        'id' => null,
    ];

    protected $rules = [
        'form.title' => 'required',
        'form.date' => 'required',
        'form.description' => 'nullable',
    ];

    public function addNew()
    {
        $this->data['subtitle'] = 'Ajout Réunion';
        $this->etat = 'add';
    }

    public function edit($id)
    {
        $r = Reunion::where('id', $id)->first();
        $this->form['title'] = $r->title;
        $this->form['description'] = $r->description;

        $this->form['date'] = $r->date;
        $this->form['id'] = $r->id;

        $this->data['subtitle'] = 'Edition Réunion';
        $this->etat = 'add';

    }

    public function deleteReunion($id)
    {
        $reunion = Reunion::where('id', $id)->first();
        $reunion->delete();

        $this->dispatchBrowserEvent('reunionDeleted');

        $this->histo->addHistorique("Suppression d'une réunion", "Suppression");
    }

    public function retour()
    {
        $this->data['subtitle'] = 'Liste des réunions';
        $this->etat = 'list';

        $this->formInit();
    }

    public function calendrier()
    {
        $this->data['subtitle'] = 'Liste des réunions sous forme de calendrier';
        $this->etat = 'calendrier';
    }

    public function addReunion()
    {
        if($this->form['id']){
            $r = Reunion::where('id', $this->form['id'])->first();

            dd($this->form);
        }else{
            $this->validate();
            Reunion::create([
                'title' => $this->form['title'],
                'description' => $this->form['description'],
                'date' => $this->form['date'],
            ]);

            $this->dispatchBrowserEvent('reunionAdded');

            $this->histo->addHistorique("Ajout d'une réunion", "Ajout");
        }

        $this->retour();

    }

    public function render()
    {
        $reunions = Reunion::orderBy('title', 'ASC')->get();
        $this->histo = new Astuce();

        return view('livewire.reunions', [
            'page' => 'reunion',
            'reunions' => $reunions,
        ])->layout('layouts.app');
    }

    private function formInit()
    {
        $this->form['title'] = '';
        $this->form['date'] = null;
        $this->form['description'] = '';
        $this->form['id'] = null;
    }
}
