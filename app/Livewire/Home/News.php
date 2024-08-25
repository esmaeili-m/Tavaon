<?php

namespace App\Livewire\Home;

use Livewire\Component;

class News extends Component
{
    public function render()
    {
        $data=\App\Models\News::where('status',1)->orderBy('order')->get();
        return view('livewire.home.news',compact('data'))->layout('layouts.home');
    }
}
