<?php

namespace App\Livewire\Admin\Queztions;

use App\Models\Queztions;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;

class Update extends Component
{
    public $queztion,$title,$description;
    public function mount($id)
    {
        $this->queztion=Queztions::find($id);
        $this->title=$this->queztion->title;
        $this->description=$this->queztion->description;
    }
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
        $this->queztion->update([
            'title'=>$this->title,
            'description'=>$this->description,
        ]);
        session()->flash('alert', 'ایتم با موفقیت اپدیت شد');
        return redirect()->route('setting.queztions.list');
    }
    public function render()
    {
        return view('livewire.admin.queztions.update');
    }
}
