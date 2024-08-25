<?php

namespace App\Livewire\Admin\Users;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;

class Create extends Component
{
    public $name,$email,$code_meli,$phone,$role=1,$password;
    public function save(){
        Validator::validate(
            [
                'name' => $this->name,
                'phone' => $this->phone,
                'email' => $this->email,
                'code_meli' => $this->code_meli,
                'role' => $this->role,
                'password' => $this->password,
            ],
            [
                'name' => 'required',
                'phone' => 'required',
                'email' => 'required|unique:users,email|email',
                'code_meli' => 'required|unique:users,code_meli',
                'role' => 'required',
                'password' => 'required',
            ],
            [
                'name.required' => 'این فیلد الزامی می باشد',
                'phone.required' => 'این فیلد الزامی می باشد',
                'code_meli.required' => 'این فیلد الزامی می باشد',
                'code_meli.unique' => 'کد ملی تکراری می باشد لطفا کد ملی دیگری را وارد کنید.',
                'email.unique' => 'ایمیل تکراری می باشد لطفا ایمیل دیگری را وارد کنید.',
                'email.required' => 'این فیلد الزامی می باشد',
                'email.email' => 'ایمیل نامعتبر می باشد',
                'password.required' => 'این فیلد الزامی می باشد',
                'role.required' => 'این فیلد الزامی می باشد',
            ],
        );
        User::create([
           'name'=>$this->name,
           'phone'=>$this->phone,
           'email'=>$this->email,
           'code_meli'=>$this->code_meli,
           'role'=>$this->role,
           'password'=>Hash::make($this->password),
        ]);
        session()->flash('alert', 'کاربر با موفقیت ایجاد شد');
        return redirect()->route('user.list');
    }
    public function render()
    {
        return view('livewire.admin.users.create');
    }
}
