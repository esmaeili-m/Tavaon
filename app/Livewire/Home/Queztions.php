<?php

namespace App\Livewire\Home;

use Livewire\Component;

class Queztions extends Component
{
    public function render()
    {
        $queztions=\App\Models\Queztions::get()->toArray();
        return view('livewire.home.queztions',compact('queztions'))->layout('layouts.home');
    }
}
