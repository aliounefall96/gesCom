<?php

namespace App\Http\Livewire;

use App\Models\Astuce;
use App\Models\Prospect;
use Livewire\Component;

class Prospects extends Component
{
    public $data = [
        'icon' => 'fa fa-tty',
        'title' => 'Prospects',
        'subtitle' => 'Liste des prospects',
    ];

    public $form = [
        'sujet' => '',
        'source' => '',
        'email' => '',
        'adresse' => '',
        'pays' => '',
        'assignation' => '',
        'tel' => '',
        'id' => null,
    ];

    public $rules = [
        'form.sujet' => 'required|min:2',
        'form.source' => 'required',
        'form.email' => 'required',
        'form.adresse' => 'required',
        'form.pays' => 'required',
        'form.assignation' => 'required',
        'form.tel' => ['required', 'min:9', 'max:9', 'regex:/^[33|70|75|76|77|78]+[0-9]{7}$/'],
    ];

    protected $messages = [
        'form.pays.required' => 'Le pays est requis',
        'form.email.required' => 'L\'email est requis',
        'form.assignation.required' => 'Le nom est requis',
        'form.sujet.min' => 'Le nom doit avoir au minimum 2 caractéres',
        'form.tel.regex' => 'Le numéro de téléphone est invalid',
        'form.tel.min' => 'Le numéro de téléphone doit avoir 8 chiffres',
        'form.tel.max' => 'Le numéro de téléphone doit avoir 8 chiffres',
    ];

    public $etat = 'list';
    public $emps;
    public $histo;
    public $pays;
    public $sources;

    public function addNew()
    {
        $this->data['subtitle'] = 'Ajout Prospect';
        $this->etat = 'add';
    }

    public function retour()
    {
        $this->data['subtitle'] = 'Liste des prospects';
        $this->etat = 'list';
        $this->initForm();
    }

    public function edit($id)
    {
        $prospect = Prospect::where('id', $id)->first();

        $this->form['id'] = $prospect->id;
        $this->form['assignation'] = $prospect->assignation;
        $this->form['sujet'] = $prospect->sujet;
        $this->form['email'] = $prospect->email;
        $this->form['adresse'] = $prospect->adresse;
        $this->form['tel'] = $prospect->tel;
        $this->form['pays'] = $prospect->pays;
        $this->form['source'] = $prospect->source;

        $this->data['subtitle'] = 'Edition Prospect';
        $this->etat = 'add';
    }


    public function save()
    {
        $this->validate();

        if ($this->form['id']) {
            $prospect = Prospect::where('id', $this->form['id'])->first();

            $prospect->sujet = $this->form['sujet'];
            $prospect->adresse = $this->form['adresse'];
            $prospect->tel = $this->form['tel'];
            $prospect->pays = $this->form['pays'];
            $prospect->email = $this->form['email'];
            $prospect->source = $this->form['source'];
            $prospect->assignation = $this->form['assignation'];

            $prospect->save();

            $this->dispatchBrowserEvent('prospectUpdated');

            $this->histo->addHistorique("Edition d'un prospect", "Edition");
        } else {
            Prospect::create([
                'sujet' => $this->form['sujet'],
                'adresse' => $this->form['adresse'],
                'tel' => $this->form['tel'],
                'pays' => $this->form['pays'],
                'email' => $this->form['email'],
                'assignation' => $this->form['assignation'],
                'source' => $this->form['source']
            ]);

            $this->dispatchBrowserEvent('prospectAdded');

            $this->histo->addHistorique("Ajout d'un prospect", "Ajout");
        }

        $this->retour();
    }

    public function delete($id)
    {
        $prospect = Prospect::where('id', $id)->first();

        $prospect->delete();

        $this->dispatchBrowserEvent('prospectDeleted');

        $this->histo->addHistorique("Suppression d'un prospect", "Suppression");
    }

    public function render()
    {
        $prospects = Prospect::orderBy('sujet', 'ASC')->get();
        $this->histo = new Astuce();

        $this->emps = $this->histo->getEmployes();
        $this->pays = $this->histo->getCountries();
        $this->sources = $this->histo->getProspectSource();

        return view('livewire.prospects', [
            'page' => 'prospect',
            'prospects' => $prospects,
        ])->layout('layouts.app');
    }

    private function initForm()
    {
        $this->form['sujet'] = '';
        $this->form['source'] = '';
        $this->form['email'] = '';
        $this->form['adresse'] = '';
        $this->form['pays'] = '';
        $this->form['assignation'] = '';
        $this->form['tel'] = '';
        $this->form['id'] = null;
    }
}
