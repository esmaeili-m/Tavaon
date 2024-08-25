<?php

namespace App\Livewire\Admin\History;

use App\Models\History;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;
use Livewire\WithFileUploads;

class Update extends Component
{
    use WithFileUploads;
    public $date,$history,$description,$news,$logo;

    public function UpdatedLogo()
    {
        $this->logo=uploadFile($this->logo,'history');

    }
    public function mount($id)
    {
        $this->history=History::find($id);
        $this->date=$this->history->date;
        $this->description=$this->history->description;
        $this->logo=$this->history->logo;
    }
    public function save(){
        Validator::validate(
            [
                'date' => $this->date,
                'description' => $this->description,

            ],
            [
                'date' => 'required',
                'description' => 'required',

            ],
            [
                'date.required' => 'این فیلد الزامی می باشد',
                'description.required' => 'این فیلد الزامی می باشد',

            ],
        );
        $this->history->update([
            'date'=>$this->date,
            'description'=>$this->description,
            'logo'=>$this->logo,
        ]);
        session()->flash('alert', 'تاریخچه با موفقیت ویرایش شد');
        return redirect()->route('history.list');
    }
    public function render()
    {
        return view('livewire.admin.history.update');
    }
}
