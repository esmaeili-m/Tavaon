<?php

namespace App\Livewire\Home;

use Livewire\Component;

class Post extends Component
{
    public function render()
    {
        $data=\App\Models\Post::where('status',1)->orderBy('order')->get();
        return view('livewire.home.post',compact('data'))->layout('layouts.home');
    }
}
