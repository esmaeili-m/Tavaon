<?php

namespace App\Livewire\Home;

use Livewire\Component;

class History extends Component
{
    public function render()
    {
        return view('livewire.home.history')->layout('layouts.home');
    }
}
