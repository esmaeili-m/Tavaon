<?php

namespace App\Livewire\Home;

use App\Models\Bakery;
use App\Models\Capital;
use App\Models\Code;
use App\Models\Orders;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Livewire\Component;

class Profile extends Component
{
    public $user,$name,$phone,$data,$email,$password;
    protected $rules=[
       'phone'=>'required|size:11',
       'name'=>'required',
       'email'=>'required',
       'password'=>'nullable|min:8'
    ];
    public function mount()
    {
        $this->user=auth()->user();
        $this->name=$this->user->name;
        $this->phone=$this->user->phone;
        $this->email=$this->user->email;

    }
    public function update_profile()
    {
        $this->validate();
        $this->user->update([
           'name'=>$this->name,
           'phone'=>$this->phone,
           'email'=>$this->email,
        ]);
        if ($this->password){
            $this->user->update([
                'password'=>Hash::make($this->password)
            ]);
        }
        $this->dispatch('alert',icon:'success',message:'اطلاعات شما با موفقیت بروز رسانی شد');
    }
    public function render()
    {
        $this->data=Capital::where('user_id',\auth()->user()->id)->get();
        return view('livewire.home.profile')->layout('layouts.home');
    }
}
