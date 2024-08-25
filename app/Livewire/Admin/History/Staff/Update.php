<?php

namespace App\Livewire\Admin\History\Staff;

use App\Models\Staff;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;
use Livewire\WithFileUploads;

class Update extends Component
{
    use WithFileUploads;
    public $name,$description,$logo,$phone,$role,$ids,$staff;


    public function UpdatedLogo()
    {
        $this->logo=uploadFile($this->logo,'staff');

    }
    public function mount($id)
    {
        $this->staff=Staff::find($id);
        $this->name=$this->staff->name;
        $this->ids=$this->staff->history_id;
        $this->role=$this->staff->role;
        $this->description=$this->staff->description;
        $this->logo=$this->staff->logo;
    }
    public function save(){
        Validator::validate(
            [
                'name' => $this->name,
                'description' => $this->description,
                'role' => $this->role,

            ],
            [
                'name' => 'required',
                'description' => 'required',
                'role' => 'required',

            ],
            [
                'name.required' => 'این فیلد الزامی می باشد',
                'role.required' => 'این فیلد الزامی می باشد',
                'description.required' => 'این فیلد الزامی می باشد',

            ],
        );
        $this->staff->update([
            'name'=>$this->name,
            'role'=>$this->role,
            'description'=>$this->description,
            'logo'=>$this->logo,
        ]);
        session()->flash('alert', 'کارمند با موفقیت ویرایش شد');
        return redirect()->route('staff.list',$this->ids);
    }
    public function render()
    {
        return view('livewire.admin.history.staff.update');
    }
}
