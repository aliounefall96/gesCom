<?php

namespace App\Http\Livewire;

use App\Models\Vente;
use Livewire\Component;

class Ventes extends Component
{
    public function render()
    {
        $data = [];
        $data['icon'] = 'icon-basket-loaded';
        $data['title'] = 'Ventes';
        $data['subtitle'] = 'Liste des ventes';

        $ventes = Vente::with(['client', 'employed', 'produitVendus'])->orderBy('date', 'DESC')->get();

        return view('livewire.ventes', [
            'data' => $data,
            'page' => 'vente',
            'ventes' => $ventes,
        ])->layout('layouts.app');
    }
}
