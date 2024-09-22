<?php

namespace App\Livewire\Admin\Slider;

use App\Models\Slider;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;
    public $title,$description,$logo,$color;
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
        if ($this->logo){
            $file=uploadFile($this->logo,'News');
        }
        Slider::create([
            'title'=>$this->title,
            'description'=>$this->description,
            'color'=>$this->color ?? '#ffffff',
            'order'=>$this->get_order(),
            'image'=>$file,
        ]);
        session()->flash('alert', 'اسلایدر با موفقیت ایجاد شد');
        return redirect()->route('slider.list');
    }
    public function get_order()
    {
        $max=Slider::max('order');
        return $max == 0 ? $max=1 : $max+1;
    }
    public function render()
    {
        return view('livewire.admin.slider.create');
    }
}
