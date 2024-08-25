<?php

namespace App\Livewire\Admin\Slider;

use App\Models\Post;
use App\Models\Slider;
use Livewire\Component;

class Index extends Component
{

    public function mount()
    {
        if (session()->has('alert')) {
            $this->dispatch('alert',icon:'success',message: session('alert') );
        }
    }
    public function status($id)
    {
        $data=Slider::find($id);
        if ($data->status){
            $data->update(['status'=>0]);
            $this->dispatch('alert',icon:'success',message: 'وضعیت پروژه با موفقیت تغییر کرد' );

        }else{
            $data->update(['status'=>1]);
            $this->dispatch('alert',icon:'success',message: 'وضعیت پروژه با موفقیت تغییر کرد' );
        }
    }

    public function delete($id)
    {
        $user=Slider::find($id)->delete();
        $this->dispatch('alert',icon:'success',message: ' پروژه با موفقیت حذف شد' );

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
        $data=Slider::get();
        return view('livewire.admin.slider.index',compact('data'));
    }
}
