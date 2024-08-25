<?php

namespace App\Livewire\Admin\Queztions;

use App\Models\Queztions;
use Livewire\Component;

class Index extends Component
{
    public function mount()
    {
        if (session()->has('alert')) {
            $this->dispatch('alert',icon:'success',message: session('alert') );
        }
    }

    public function delete($id)
    {
        $user=Queztions::find($id)->delete();
        $this->dispatch('alert',icon:'success',message: ' ایتم با موفقیت حذف شد' );

    }

    public function truncateText($text, $maxLength = 50)
    {
        $text = strip_tags($text);
        if (mb_strlen($text) > $maxLength) {
            $text = mb_substr($text, 0, $maxLength) . '...';
        }
        return $text;
    }
    public function render()
    {
        $data=Queztions::get();
        return view('livewire.admin.queztions.index',compact('data'));
    }
}
