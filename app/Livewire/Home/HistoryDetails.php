<?php

namespace App\Livewire\Home;

use Livewire\Component;

class HistoryDetails extends Component
{
    public function render()
    {
        return view('livewire.home.history-details')->layout('layouts.home');
    }
}
