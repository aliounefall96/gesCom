<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Home extends Component
{
    public function render()
    {
        $data = [];
        $data['icon'] = 'icon-home';
        $data['title'] = 'Accueil';
        $data['subtitle'] = '';

        return view('livewire.home', [
            'data' => $data,
            'page' => 'home',
        ])
        ->layout('layouts.app');
    }
}
