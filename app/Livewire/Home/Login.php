<?php

namespace App\Livewire\Home;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Login extends Component
{
    public $password,$phone;
    protected $rules=[
        'password'=>'required',
        'phone'=>'required | size:11',
    ];
    public function login(){
    {
        $this->validate();
        $user = User::where('phone', $this->phone)->first();
        if ($user && Hash::check($this->password, $user->password)) {
            auth()->login($user);
            return redirect()->route('home');
        } else {
            session()->flash('message', 'اطلاعات وارد شده صحیح نمی‌باشد.');
        }
    }
    }
    public function render()
    {
        return view('livewire.home.login')->layout('layouts.login');
    }
}
