<?php

namespace App\Livewire\Home;

use Livewire\Component;

class EventDetail extends Component
{
    public $ids,$post;
    public function mount($id)
    {
        $this->ids=$id;
        $this->post=\App\Models\Events::where('slug',$id)->where('status',1)->first();
        if (!$this->post){
            abort(404);
        }
    }
    public function render()
    {
        $data=\App\Models\Events::whereNot('slug',$this->ids)->where('status',1)->orderBy('order')->get();
        return view('livewire.home.event-detail',compact('data'))->layout('layouts.home');
    }
}
