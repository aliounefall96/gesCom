<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Rapports extends Component
{
    public function render()
    {
        $data = [];
        $data['icon'] = 'fas fa-chart-bar';
        $data['title'] = 'Rapports';
        $data['subtitle'] = 'Comptabilité Générale';

        return view('livewire.rapports', [
            'page' => 'rapport',
            'data' => $data,
        ])->layout('layouts.app');
    }
}
