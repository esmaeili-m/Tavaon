<?php

namespace App\Livewire\Home;

use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        $projects=\App\Models\Post::take(6)->where('status',1)->get();
        $news=\App\Models\News::latest()->where('status',1)->take(6)->get();
        $events=\App\Models\Events::where('status',1)->orderBy('order')->get();
        return view('livewire.home.index',compact('projects','news','events'))->layout('layouts.home');
    }
}
