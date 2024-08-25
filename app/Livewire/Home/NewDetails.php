<?php

namespace App\Livewire\Home;

use Livewire\Component;

class NewDetails extends Component
{
    public $ids,$post;
    public function mount($id)
    {
        $this->ids=$id;
        $this->post=\App\Models\News::where('id',$id)->where('status',1)->first();
        if (!$this->post){
            abort(404);
        }

    }
    public function render()
    {
        $data=\App\Models\News::whereNot('id',$this->ids)->where('status',1)->orderBy('order')->get();
        return view('livewire.home.new-details',compact('data'))->layout('layouts.home');
    }
}
