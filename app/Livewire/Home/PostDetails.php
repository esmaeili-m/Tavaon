<?php

namespace App\Livewire\Home;

use Livewire\Component;

class PostDetails extends Component
{
    public $ids,$post;
    public function mount($id)
    {
        $this->ids=$id;
        $this->post=\App\Models\Post::where('slug',$id)->where('status',1)->with('user')->first();
        if (!$this->post){
            abort(404);
        }

    }
    public function render()
    {
        $data=\App\Models\Post::whereNot('slug',$this->ids)->where('status',1)->orderBy('order')->get();
        return view('livewire.home.post-details',compact('data'))->layout('layouts.home');
    }
}
