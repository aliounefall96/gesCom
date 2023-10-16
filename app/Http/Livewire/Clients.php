<?php

namespace App\Http\Livewire;

use App\Models\Astuce;
use App\Models\Client;
use Livewire\Component;

class Clients extends Component
{
    public $data = [
        'icon' => 'fas fa-users',
        'title' => 'Clients',
        'subtitle' => 'Liste des clients',
    ];

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

    public $etat = 'list';
    public $histo;
    public $pays;

    public function addNew()
    {
        $this->data['subtitle'] = 'Ajout Client';
        $this->etat = 'add';
    }
    public function edit($id)
    {
        $client = Client::where('id', $id)->first();

        $this->form['id'] = $client->id;
        $this->form['nom'] = $client->nom;
        $this->form['email'] = $client->email;
        $this->form['adresse'] = $client->adresse;
        $this->form['tel'] = $client->tel;
        $this->form['pays'] = $client->pays;

        $this->data['subtitle'] = 'Edition Client';
        $this->etat = 'add';
    }

    public function retour()
    {
        $this->data['subtitle'] = 'Liste des clients';
        $this->etat = 'list';
        $this->initForm();
    }

    public function save()
    {
        $this->validate();

        if($this->form['id']){
            $client = Client::where('id', $this->form['id'])->first();

            $client->nom = $this->form['nom'];
            $client->adresse = $this->form['adresse'];
            $client->tel = $this->form['tel'];
            $client->pays = $this->form['pays'];
            $client->email = $this->form['email'];

            $client->save();

            $this->dispatchBrowserEvent('clientUpdated');

            $this->histo->addHistorique("Edition d'un client", "Edition");
        }else{
            Client::create([
                'nom' => $this->form['nom'],
                'adresse' => $this->form['adresse'],
                'tel' => $this->form['tel'],
                'pays' => $this->form['pays'],
                'email' => $this->form['email']
            ]);

            $this->dispatchBrowserEvent('clientAdded');

            $this->histo->addHistorique("Ajout d'un client", "Ajout");
        }

        $this->retour();
    }

    public function delete($id)
    {
        $client = Client::where('id', $id)->first();

        $client->delete();

        $this->dispatchBrowserEvent('clientDeleted');

        $this->histo->addHistorique("Suppression d'un client", "Suppression");
    }

    public function render()
    {
        $clients = Client::orderBy('nom', 'ASC')->get();
        $this->histo = new Astuce();

        $this->pays = $this->histo->getCountries();

        return view('livewire.clients', [
            'page' => 'client',
            'clients' => $clients,
        ]);
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
