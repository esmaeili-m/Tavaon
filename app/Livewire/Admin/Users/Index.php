<?php

namespace App\Livewire\Admin\Users;
use App\Models\User;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    public $name,$email,$fillter=[],$search=0;

    public function mount()
    {
        if (session()->has('alert')) {
           $this->dispatch('alert',icon:'success',message: session('alert') );
        }
    }
    public function status($id)
    {
        $user=User::find($id);
        if ($user->status){
            $user->update(['status'=>0]);
            $this->dispatch('alert',icon:'success',message: 'وضعیت کاربر با موفقیت تغییر کرد' );

        }else{
            $user->update(['status'=>1]);
            $this->dispatch('alert',icon:'success',message: 'وضعیت کاربر با موفقیت تغییر کرد' );
        }
    }

    public function delete($id)
    {
        $user=User::find($id)->delete();
        $this->dispatch('alert',icon:'success',message: ' کاربر با موفقیت حذف شد' );

    }

    public function search_user()
    {
        $data = User::query();
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
        $data = User::orderBy('id', 'desc');
        if ($this->search) {
            $data = $data->whereIn('id', $this->fillter);
        }

        $data = $data->paginate(10);
        return view('livewire.admin.users.index',compact('data'));
    }
}
