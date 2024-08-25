<?php

namespace App\Livewire\Admin\Users;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Livewire\Component;

class Update extends Component
{
    public $name,$email,$user,$code_meli,$phone,$role=1,$password;

    public function mount($id)
    {
        $this->user=User::find($id);
        $this->name=$this->user->name;
        $this->email=$this->user->email;
        $this->code_meli=$this->user->code_meli;
        $this->phone=$this->user->phone;
        $this->role=$this->user->role;
    }
    public function save(){
        Validator::validate(
            [
                'name' => $this->name,
                'phone' => $this->phone,
                'email' => $this->email,
                'code_meli' => $this->code_meli,
                'role' => $this->role,
            ],
            [
                'name' => 'required',
                'phone' => 'required',
                'email' => 'required',Rule::unique('users', 'email')->ignore($this->user->id),
                'code_meli' => 'required',Rule::unique('users', 'code_meli')->ignore($this->user->id),
                'role' => 'required',
            ],
            [
                'name.required' => 'این فیلد الزامی می باشد',
                'phone.required' => 'این فیلد الزامی می باشد',
                'code_meli.required' => 'این فیلد الزامی می باشد',
                'email.unique' => 'ایمیل تکراری می باشد لطفا ایمیل دیگری را وارد کنید.',
                'code_meli.unique' => 'کد ملی تکراری می باشد لطفا کد ملی دیگری را وارد کنید.',
                'email.required' => 'این فیلد الزامی می باشد',
                'email.email' => 'ایمیل نامعتبر می باشد',
                'role.required' => 'این فیلد الزامی می باشد',
            ],
        );
        $this->user->update([
            'name'=>$this->name,
            'phone'=>$this->phone,
            'email'=>$this->email,
            'code_meli'=>$this->code_meli,
            'role'=>$this->role,
        ]);
        if ($this->password){
            $this->user->update([
                'password'=>Hash::make($this->password),
            ]);
        }
        session()->flash('alert', 'کاربر با موفقیت آپدیت شد');
        return redirect()->route('user.list');
    }
    public function render()
    {
        return view('livewire.admin.users.update');
    }
}
