<?php

namespace App\Http\Livewire;

use App\Models\Astuce;
use App\Models\Devis as ModelsDevis;
use App\Models\Product;
use Livewire\Component;

class Devis extends Component
{
    public $data = [
        'icon' => 'fas fa-file-invoice',
        'title' => 'Devis',
        'subtitle' => 'Liste des devis'
    ];

    public $etat = 'list';
    public $histo;
    public $emps;
    public $clients;
    public $products;
    public $statuts;
    public $idProd;
    public $subtotal = 0.00;
    public $allProducts = [];

    public $form = [
        'total_amount' => 0,
        'discount' => 0,
        'client_id' => null,
        'employed_id' => null,
        'date' => null,
        'description' => null,
        'statut' => null,
        'id' => null,
    ];

    protected $rules = [
        'form.client_id' => 'required',
        'form.employed_id' => 'required',
        'form.date' => 'required',
        'form.statut' => 'required'
    ];

    protected $messages = [
        'form.client_id.required' => 'Le champ client est requis',
        'form.employed_id.required' => 'Le champ employé est requis',
        'form.date.required' => 'Le champ date est requis',
        'form.statut.required' => 'Le champ statut est requis'
    ];

    public function addNew()
    {
        $this->data['subtitle'] = 'Ajout Devis';
        $this->etat = 'add';
        $this->addRow();
    }

    public function retour()
    {
        $this->data['subtitle'] = 'Liste des devis';
        $this->etat = 'list';

        $this->initValues();
    }

    public function fieldsNotEmpty()
    {
            $response = true;

            if(count($this->allProducts) > 0){
                foreach($this->allProducts as $item){
                    if($item['nom'] == '' || $item['description'] == '' || $item['qte'] == 0 || $item['tarif'] == 0)
                        $response = false;
                };
            }

            return $response;
    }

    public function getMontantTotal(){
        $this->subtotal = 0;
        foreach ($this->allProducts as $product) {
            $this->subtotal += $product['amount'];
        }

        $this->form['total_amount'] = $this->subtotal - ($this->subtotal * ($this->form['discount']/100));
    }

    public function getMontant($index)
    {
        dd(request()->all());


        $this->allProducts[$index]['amount'] = $this->allProducts[$index]['tarif'] * $this->allProducts[$index]['qte'] * (1+$this->allProducts[$index]['taxe']/100);

        $this->getMontantTotal();
    }

    public function addRow(){
        if($this->fieldsNotEmpty() || count($this->allProducts) == 0){
            $this->allProducts[] = [
                'nom' =>'',
                'description' =>'',
                'tarif' =>0,
                'qte' =>0,
                'taxe' =>0,
                'amount' =>0
            ];
            $this->getMontantTotal();
        }else{
            $this->dispatchBrowserEvent('rowEmpty');
        }
    }

    public function deleteRow($key){
        // $key = array_search($product, $this->allProducts);

        // if ($key !== false)
            unset($this->allProducts[$key]);

        $this->getMontantTotal();
    }

    public function addToAllProducts()
    {
        if($this->idProd){
            array_pop($this->allProducts);

            $product = Product::where('id', $this->idProd)->first();

            $this->allProducts[] = [
                'nom' => $product->nom,
                'description' => $product->description,
                'tarif' => $product->tarif,
                'qte' => 1,
                'taxe' => $product->taxe,
                'amount' => $product->tarif
            ];
        }

        $this->idProd = null;
        $this->getMontantTotal();
    }

    public function save()
    {
        $this->validate();
    }

    public function render()
    {
        $devis = ModelsDevis::with(['client', 'employed', 'devisItems'])->orderBy('date', 'DESC')->get();

        $this->histo = new Astuce();

        $this->emps = $this->histo->getEmployes();
        $this->clients = $this->histo->getClients();
        $this->products = $this->histo->getProducts();
        $this->statuts = $this->histo->getDevisStatus();

        return view('livewire.devis', [
            'page' => 'devis',
            'devis' => $devis
        ]);
    }

    private function initValues()
    {
        $this->form['total_amount'] = 0;
        $this->form['discount'] = 0;
        $this->form['client_id'] = null;
        $this->form['employed_id'] = null;
        $this->form['date'] = null;
        $this->form['description'] = null;
        $this->form['statut'] = null;
        $this->form['id'] = null;

        $this->allProducts = [];
        $this->idProd = null;
        $this->subtotal = 0.00;
    }
}
