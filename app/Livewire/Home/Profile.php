<?php

namespace App\Livewire\Home;

use App\Models\Bakery;
use App\Models\Code;
use App\Models\Orders;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Livewire\Component;

class Profile extends Component
{
    public $user,$name,$phone;
    protected $rules=[
       'phone'=>'required|size:11|unique:users,phone'
    ];
    public function updatedBakeryId()
    {
        $bakery=Bakery::find($this->bakery_id);
        $text="نانوایی ".$bakery->name." باموفقیت انتخاب شد";
        return $this->dispatch('alert',type:'success',text:$text);
    }
    public function mount()
    {
        $this->user=auth()->user();
        $this->name=$this->user->name;
        $this->phone=$this->user->phone;

    }
    public function update_profile()
    {
        $this->user->update([
           'name'=>$this->name,
        ]);
        $this->dispatch('alert',type:'success',text:'اطلاعات شما با موفقیت بروز رسانی شد');
    }
    public function render()
    {
        return view('livewire.home.profile')->layout('layouts.home');
    }
}
