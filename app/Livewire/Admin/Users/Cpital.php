<?php

namespace App\Livewire\Admin\Users;

use App\Models\Capital;
use App\Models\User;
use Livewire\Component;

class Cpital extends Component
{
    public $user,$data,$title,$value;
    public function mount($id)
    {
        $this->user=User::find($id);
        $this->data=Capital::where('user_id',$id)->get();
    }
    protected $rules=[
        'title'=>'required',
        'value'=>'required',
    ];
    public function save()
    {
        $this->validate();
        Capital::create([
           'user_id'=>$this->user->id,
           'title'=>$this->title,
           'value'=>$this->value,
        ]);
        $this->reset(['title','value']);
    }

    public function delete($id)
    {
        Capital::find($id)->delete();
        $this->dispatch('alert',icon:'success',message: ' ایتم با موفقیت حذف شد' );

    }
    public function render()
    {
        $this->data=Capital::where('user_id',$this->user->id)->get();
        return view('livewire.admin.users.cpital');
    }
}
