<?php

namespace App\Livewire\Admin\Slider;

use App\Models\Slider;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;
use Livewire\WithFileUploads;

class Update extends Component
{
    use WithFileUploads;
    public $title,$description,$logo,$slider,$color;
    public function UpdatedLogo()
    {
        $this->logo=uploadFile($this->logo,'Post');

    }
    public function mount($id)
    {
        $this->slider=Slider::find($id);
        $this->title=$this->slider->title;
        $this->color=$this->slider->color;
        $this->description=$this->slider->description;
        $this->logo=$this->slider->image;
    }
    public function save(){
        Validator::validate(
            [
                'logo' => $this->logo,

            ],
            [
                'logo' => 'required',

            ],
            [
                'logo.required' => 'این فیلد الزامی می باشد',

            ],
        );
        $this->slider->update([
            'title'=>$this->title,
            'description'=>$this->description,
            'image'=> $this->logo,
            'color'=>$this->color ?? '#ffffff',
        ]);
        session()->flash('alert', 'اسلایدر با موفقیت اپدیت شد');
        return redirect()->route('slider.list');
    }
    public function render()
    {
        return view('livewire.admin.slider.update');
    }
}
