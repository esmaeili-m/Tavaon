<?php

namespace App\Livewire\Admin\History;

use App\Models\History;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;
    public $date,$description,$logo,$phone,$role=1,$password;
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
        if ($this->logo){
            $file=uploadFile($this->logo,'history');
        }else{
            $file='panel/assets/images/user.jpg';
        }
        $order= History::max('order') == 0 ? 1 : History::max('order')+1;
        History::create([
            'date'=>$this->date,
            'description'=>$this->description,
            'order'=>$order,
            'logo'=>$file,
        ]);
        session()->flash('alert', 'تاریخجه با موفقیت ایجاد شد');
        return redirect()->route('history.list');
    }
    public function render()
    {
        return view('livewire.admin.history.create');
    }
}
