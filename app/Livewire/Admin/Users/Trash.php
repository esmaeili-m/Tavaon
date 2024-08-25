<?php

namespace App\Livewire\Admin\Users;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class Trash extends Component
{

    use WithPagination;
    public $name,$email,$fillter=[],$search=0;
    public function restore($id)
    {
        $user=User::onlyTrashed()->find($id)->restore();
        $this->dispatch('alert',icon:'success',message: ' کاربر با موفقیت بازگردانی شد' );
    }
    public function delete($id)
    {
        $user=User::onlyTrashed()->find($id)->forceDelete();
        $this->dispatch('alert',icon:'success',message: ' کاربر با موفقیت حذف شد' );

    }

    public function search_user()
    {
        $data = User::onlyTrashed();
        if ($this->name){
            $data=$data->where('name','LIKE','%'.$this->name.'%');
            $this->search=1;
        }
        if ($this->email){
            $data=$data->where('email','LIKE','%'.$this->email.'%');
            $this->search=1;
        }
        $this->fillter=$data->pluck('id');
    }
    public function render()
    {
        $data = User::onlyTrashed()->orderBy('id', 'desc');
        if ($this->search) {
            $data = $data->whereIn('id', $this->fillter);
        }
        $data = $data->paginate(10);
        return view('livewire.admin.users.trash',compact('data'));
    }
}
