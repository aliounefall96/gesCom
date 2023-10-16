<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Login extends Component
{
    public $form = [
        'email' => '',
        'password' => ''
    ];

    protected $rules = [
        'form.email' => 'required|email',
        'form.password' => 'required'
    ];

    protected $messages = [
        'form.email.required' => 'Email requis.',
        'form.email.email' => 'Email non valide.',
        'form.password.required' => 'Mot de passe requis.',
    ];

    public function connecter()
    {
        $this->validate();

        Auth::attempt($this->form);

        return redirect(route('home'));
    }

    public function render()
    {
        return view('livewire.login')->layout('layouts.app');
    }
}
