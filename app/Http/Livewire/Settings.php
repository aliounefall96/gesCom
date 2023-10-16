<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Settings extends Component
{
    public function render()
    {
        $data = [];
        $data['icon'] = 'fas fa-chart-bar';
        $data['title'] = 'Paramètres';
        $data['subtitle'] = 'Paramètres Généraux';

        return view('livewire.settings', [
            'page' => 'setting',
            'data' => $data
        ])->layout('layouts.app');
    }
}
