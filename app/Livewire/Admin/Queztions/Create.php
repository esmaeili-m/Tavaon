<?php

namespace App\Livewire\Admin\Queztions;

use App\Models\Queztions;
use App\Models\Slider;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;

class Create extends Component
{
    public $title,$description;
    public function save(){
        Validator::validate(
            [
                'title' => $this->title,'description'=>$this->description

            ],
            [
                'title' => 'required','description'=>'required',

            ],
            [
                'title.required' => 'این فیلد الزامی می باشد',
                'description.required' => 'این فیلد الزامی می باشد',

            ],
        );
        Queztions::create([
            'title'=>$this->title,
            'description'=>$this->description,
        ]);
        session()->flash('alert', 'سوال با موفقیت ایجاد شد');
        return redirect()->route('setting.queztions.list');
    }
    public function render()
    {
        return view('livewire.admin.queztions.create');
    }
}
