<?php

namespace App\Livewire\Admin;

use Livewire\Component;

class Messages extends Component
{
    public function delete($id)
    {
        \App\Models\Messages::find($id)->delete();
        return $this->dispatch('alert',icon:'success',message:'پیام با موفقیت حذف شد');
    }
    public function render()
    {
        $data=\App\Models\Messages::orderBy('id','desc')->get();
        return view('livewire.admin.messages',compact('data'));
    }
}
