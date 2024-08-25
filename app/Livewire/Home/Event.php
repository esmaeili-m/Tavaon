<?php

namespace App\Livewire\Home;

use Livewire\Component;

class Event extends Component
{
    public function render()
    {
        $data=\App\Models\Events::where('status',1)->orderBy('order')->get();
        return view('livewire.home.event',compact('data'))->layout('layouts.home');
    }
}
