<?php

namespace App\Livewire\Admin\History\Staff;

use App\Models\Staff;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;
    public $name,$description,$logo,$phone,$role,$ids;

    public function mount($id)
    {
        $this->ids=$id;
    }
    public function save(){
        Validator::validate(
            [
                'name' => $this->name,
                'role' => $this->role,
                'description' => $this->description,

            ],
            [
                'name' => 'required',
                'role' => 'required',
                'description' => 'required',

            ],
            [
                'name.required' => 'این فیلد الزامی می باشد',
                'role.required' => 'این فیلد الزامی می باشد',
                'description.required' => 'این فیلد الزامی می باشد',

            ],
        );
        if ($this->logo){
            $file=uploadFile($this->logo,'history');
        }else{
            $file='panel/assets/images/user-staff.jpg';
        }
        Staff::create([
            'name'=>$this->name,
            'role'=>$this->role,
            'history_id'=>$this->ids,
            'description'=>$this->description,
            'logo'=>$file,
        ]);
        session()->flash('alert', 'تاریخجه با موفقیت ایجاد شد');
        return redirect()->route('staff.list',$this->ids);
    }
    public function render()
    {
        return view('livewire.admin.history.staff.create');
    }
}
