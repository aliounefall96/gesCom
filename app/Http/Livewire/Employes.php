<?php

namespace App\Http\Livewire;

use App\Models\Astuce;
use Livewire\Component;
use App\Models\Employed;
use Livewire\WithPagination;
use Livewire\WithFileUploads;

class Employes extends Component
{
    use WithPagination;
    use WithFileUploads;

    protected $paginationTheme = 'bootstrap';

    public $data = [
        'icon' => 'icon-users',
        'title' => 'Employés',
        'subtitle' => 'Liste des employés'
    ];

    public $etat = 'list';
    public $photo;
    public $histo;

    public  $fonctions;

    public $form = [
        'prenom' => '',
        'nom' => '',
        'email' => '',
        'adresse' => '',
        'fonction' => '',
        'sexe' => '',
        'tel' => '',
        'profil' => '',
        'id' => null
    ];

    protected $rules = [
        'form.prenom' => 'required|min:2',
        'form.nom' => 'required|min:2',
        'form.email' => 'required',
        'form.tel' => ['required','min:9','max:9', 'regex:/^[33|70|75|76|77|78]+[0-9]{7}$/'],
        'form.fonction' => 'required',
        'form.adresse' => 'required',
        'form.sexe' => 'required'
    ];

    protected $messages = [
        'form.prenom.required' => 'Le prenom est requis',
        'form.prenom.min' => 'Le prenom doit avoir au minimum 2 caractéres',
        'form.nom.required' => 'Le nom est requis',
        'form.nom.min' => 'Le nom doit avoir au minimum 2 caractéres',
        'form.tel.regex' => 'Le numéro de téléphone est invalid',
        'form.tel.min' => 'Le numéro de téléphone doit avoir 8 chiffres',
        'form.tel.max' => 'Le numéro de téléphone doit avoir 8 chiffres',
    ];

    public function addNew()
    {
        $this->etat = 'add';
        $this->data['subtitle'] = 'Ajout employé';
    }

    public function retour()
    {
        $this->etat = 'list';
        $this->data['subtitle'] = 'Liste des employés';
        $this->formInit();
    }

    public function edit($id)
    {
        $em = Employed::where('id', $id)->first();

        $this->assign($em);

        $this->etat = 'edit';
        $this->data['subtitle'] = 'Edition employé';
    }

    public function info($id)
    {
        $em = Employed::where('id', $id)->first();

        $this->assign($em);

        $this->etat = 'info';
        $this->data['subtitle'] = 'Information de '. $em->prenom.' '. $em->nom;
    }

    public function addEmploye()
    {
        $this->validate();

        if ($this->form['sexe'] === 'Homme') {
            $this->form['profil'] = "user-male.png";
        } else {
            $this->form['profil'] = "user-female.png";
        }

        Employed::create([
            'prenom' => $this->form['prenom'],
            'nom' => $this->form['nom'],
            'sexe' => $this->form['sexe'],
            'email' => $this->form['email'],
            'adresse' => $this->form['adresse'],
            'fonction' => $this->form['fonction'],
            'profil' => $this->form['profil'],
            'tel' => $this->form['tel']
        ]);

        $this->dispatchBrowserEvent('employedAdded');

        $this->histo->addHistorique("Ajout d'un employé", "Ajout");

        $this->retour();

    }

    public function editEmploye()
    {
        if($this->form['id']){
            $em = Employed::where('id', $this->form['id'])->first();

            $this->validate();

            $em->prenom = $this->form['prenom'];
            $em->nom = $this->form['nom'];
            $em->email = $this->form['email'];
            $em->sexe = $this->form['sexe'];
            $em->fonction = $this->form['fonction'];
            $em->adresse = $this->form['adresse'];
            $em->tel = $this->form['tel'];

            $em->save();
            $this->dispatchBrowserEvent('employedUpdated');

            $this->histo->addHistorique("Modification des informations d'un employé", "Edition");

        }
    }

    public function uploadImage()
    {
        if($this->form['id']){
            $this->validate([
                'photo' => 'image|max:1024'
            ]);

            $em = Employed::where('id', $this->form['id'])->first();

            $imgName = 'img_' . md5($this->form['id']).'.jpg';

            $this->photo->storeAs('public/images', $imgName);

            $em->profil = $imgName;
            $em->save();

            $this->form['profil'] = $imgName;

            $this->photo = null;

            $this->dispatchBrowserEvent('profilUpdated');

            $this->histo->addHistorique("Modification de l'image d'un employé", "Edition");


        }
    }

    public function deleteEmploye($id)
    {
        $em = Employed::where('id', $id)->first();

        $em->delete();

        $this->histo->addHistorique("Suppression d'un employé", "Suppression");

        $this->dispatchBrowserEvent('employedDeleted');

    }

    private function formInit()
    {
        $this->form['prenom'] = '';
        $this->form['nom'] = '';
        $this->form['sexe'] = '';
        $this->form['email'] = '';
        $this->form['adresse'] = '';
        $this->form['fonction'] = '';
        $this->form['profil'] = '';
        $this->form['tel'] = '';
        $this->form['id'] = null;
        $this->photo = null;
    }

    private function assign(Employed $em)
    {
        $this->form['prenom'] = $em->prenom;
        $this->form['nom'] = $em->nom;
        $this->form['sexe'] = $em->sexe;
        $this->form['email'] = $em->email;
        $this->form['adresse'] = $em->adresse;
        $this->form['fonction'] = $em->fonction;
        $this->form['profil'] = $em->profil;
        $this->form['tel'] = $em->tel;
        $this->form['id'] = $em->id;
    }

    public function render()
    {
        $emps = Employed::orderBy('prenom', 'ASC')->paginate(8);
        $this->histo = new Astuce();
        $this->fonctions = $this->histo->getFonction();

        return view('livewire.employes', [
            'page' => 'employe',
            'emps' => $emps,
        ])->layout('layouts.app');
    }
}
