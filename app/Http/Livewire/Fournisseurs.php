<?php

namespace App\Http\Livewire;

use App\Models\Astuce;
use App\Models\Fournisseur;
use Livewire\Component;

class Fournisseurs extends Component
{
    public $data = [
        'icon' => 'fas fa-street-view',
        'title' => 'Fournisseurs',
        'subtitle' => 'Liste des fournisseurs',
    ];

    public $etat = 'list';
    public $histo;
    public $pays;

    public $form = [
        'nom' => '',
        'adresse' => '',
        'tel' => '',
        'pays' => '',
        'email' => '',
        'id' => null,
    ];

    protected $rules = [
        'form.nom' => 'required|min:2',
        'form.adresse' => 'required',
        'form.tel' => ['required', 'min:9', 'max:9', 'regex:/^[33|70|75|76|77|78]+[0-9]{7}$/'],
        'form.pays' => 'required',
        'form.email' => 'required',
    ];

    protected $messages = [
        'form.pays.required' => 'Le pays est requis',
        'form.email.required' => 'L\'email est requis',
        'form.nom.required' => 'Le nom est requis',
        'form.nom.min' => 'Le nom doit avoir au minimum 2 caractéres',
        'form.tel.regex' => 'Le numéro de téléphone est invalid',
        'form.tel.min' => 'Le numéro de téléphone doit avoir 8 chiffres',
        'form.tel.max' => 'Le numéro de téléphone doit avoir 8 chiffres',
    ];

    public function addNew(){
        $this->data['subtitle'] = "Ajout Fournisseur";
        $this->etat = 'add';
    }

    public function retour()
    {
        $this->data['subtitle'] = 'Liste des fournisseurs';
        $this->etat = 'list';
        $this->initForm();
    }

    public function edit($id)
    {
        $fr = Fournisseur::where('id', $id)->first();

        $this->form['id'] = $fr->id;
        $this->form['nom'] = $fr->nom;
        $this->form['email'] = $fr->email;
        $this->form['adresse'] = $fr->adresse;
        $this->form['tel'] = $fr->tel;
        $this->form['pays'] = $fr->pays;

        $this->data['subtitle'] = 'Edition Fournisseur';
        $this->etat = 'add';
    }

    public function save()
    {
        $this->validate();

        if ($this->form['id']) {
            $fr = Fournisseur::where('id', $this->form['id'])->first();

            $fr->nom = $this->form['nom'];
            $fr->adresse = $this->form['adresse'];
            $fr->tel = $this->form['tel'];
            $fr->pays = $this->form['pays'];
            $fr->email = $this->form['email'];

            $fr->save();

            $this->dispatchBrowserEvent('frUpdated');

            $this->histo->addHistorique("Edition d'un fournisseur", "Edition");
        } else {
            Fournisseur::create([
                'nom' => $this->form['nom'],
                'adresse' => $this->form['adresse'],
                'tel' => $this->form['tel'],
                'pays' => $this->form['pays'],
                'email' => $this->form['email']
            ]);

            $this->dispatchBrowserEvent('frAdded');

            $this->histo->addHistorique("Ajout d'un fournisseur", "Ajout");
        }

        $this->retour();
    }

    public function delete($id)
    {
        $fr = Fournisseur::where('id', $id)->first();

        $fr->delete();

        $this->dispatchBrowserEvent('frDeleted');

        $this->histo->addHistorique("Suppression d'un fournisseur", "Suppression");
    }

    public function render()
    {
        $this->histo = new Astuce();
        $frs = Fournisseur::orderBy('nom', 'ASC')->get();
        $this->pays = $this->histo->getCountries();

        return view('livewire.fournisseurs', [
            'page' => 'fournisseur',
            'frs' => $frs,
        ])->layout('layouts.app');
    }

    private function initForm()
    {
        $this->form['nom'] = '';
        $this->form['adresse'] = '';
        $this->form['tel'] = '';
        $this->form['pays'] = '';
        $this->form['email'] = '';
        $this->form['id'] = null;
    }
}
