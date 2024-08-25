<?php

namespace App\Livewire\Home;

use App\Models\History;
use Livewire\Component;

class About extends Component
{
    public function render()
    {
        $history=\App\Models\History::where('status',1)->with('staff')->first();
        return view('livewire.home.about',compact('history'))->layout('layouts.home');
    }
}
