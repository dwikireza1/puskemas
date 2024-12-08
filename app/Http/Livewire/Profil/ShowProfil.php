<?php

namespace App\Http\Livewire\Profil;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class ShowProfil extends Component
{
    public $user;

    public function mount()
    {
        $this->user = Auth::user();
    }

    public function render()
    {
        return view('livewire.profil.show-profil');
    }
}

