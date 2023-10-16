<?php

namespace App\Http\Livewire;

use App\Models\Astuce;
use App\Models\Product;
use Livewire\Component;

class Products extends Component
{
    public $etat = 'list';
    public $taxes;
    public $histo;

    public $data = [
        'icon' => 'fab fa-product-hunt',
        'title' => 'Produits & Services',
        'subtitle' => 'Liste des produits et services',
    ];

    public $form = [
            'type' => '',
            'nom' => '',
            'description' => '',
            'taxe' => '',
            'tarif' => '',
            'id' => null,
    ];

    protected $rules = [
        'form.type' => 'required',
        'form.nom' => 'required',
        'form.description' => 'required',
        'form.taxe' => 'required',
        'form.tarif' => 'required'
    ];

    public function addNew()
    {
        $this->data['subtitle'] = "Ajout Produit ou Service";
        $this->etat = "add";
    }

    public function retour()
    {
        $this->data['subtitle'] = 'Liste des produits et services';
        $this->etat = "list";
        $this->formInit();
    }

    public function edit($id)
    {
        $prod = Product::where('id', $id)->first();

        $this->form['id'] = $prod->id;
        $this->form['nom'] = $prod->nom;
        $this->form['tarif'] = $prod->tarif;
        $this->form['type'] = $prod->type;
        $this->form['description'] = $prod->description;
        $this->form['taxe'] = $prod->taxe;

        $this->data['subtitle'] = "Edition Produit ou Service";
        $this->etat = "add";
    }

    public function addProduct()
    {
        $this->validate();

        if ($this->form['id']) {
            $prod = Product::where('id', $this->form['id'])->first();

            $prod->nom = $this->form['nom'];
                $prod->tarif = $this->form['tarif'];
                $prod->description = $this->form['description'];
                $prod->taxe = $this->form['taxe'];
                $prod->type = $this->form['type'];
            $prod->save();

            $this->dispatchBrowserEvent('productUpdated');

            $this->histo->addHistorique("Edition d'un produit/service", "Edition");

        } else {
            Product::create([
                'nom' => $this->form['nom'],
                'tarif' => $this->form['tarif'],
                'description' => $this->form['description'],
                'taxe' => $this->form['taxe'],
                'type' => $this->form['type']
            ]);

            $this->dispatchBrowserEvent('productAdded');

            $this->histo->addHistorique("Ajout d'un produit/service", "Ajout");
        }

        $this->retour();
    }

    public function deleteProduct($id)
    {
        $prod = Product::where('id', $id)->first();

        $prod->delete();

        $this->dispatchBrowserEvent('productDeleted');

        $this->histo->addHistorique("Suppression d'un produit/service", "Suppression");
    }

    public function render()
    {
        $products = Product::orderBy('nom', 'ASC')->get();

        $this->histo = new Astuce();

        $this->taxes = $this->histo->getTaxe();

        return view('livewire.products', [
            'page' => 'product',
            'products' => $products,
        ])->layout('layouts.app');
    }

    private function formInit()
    {
        $this->form['type'] = '';
        $this->form['nom'] = '';
        $this->form['description'] = '';
        $this->form['taxe'] = '';
        $this->form['tarif'] = '';
        $this->form['id'] = null;
    }
}
