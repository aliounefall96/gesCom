<?php

namespace App\Http\Livewire;

use App\Models\Expense;
use Livewire\Component;

class Depenses extends Component
{
    public function render()
    {
        $data = [];
        $data['icon'] = 'fa fa-file';
        $data['title'] = 'Dépenses';
        $data['subtitle'] = 'Liste des dépenses';

        $depenses =Expense::orderBy('date', 'DESC')->get();

        return view('livewire.depenses', [
            'data' => $data,
            'page' => 'depense',
            'depenses' => $depenses,
        ])->layout('layouts.app');
    }
}
