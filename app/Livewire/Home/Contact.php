<?php

namespace App\Livewire\Home;

use App\Models\Messages;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;

class Contact extends Component
{
    public $name,$email,$description;
    public function save_message()
    {
        Validator::validate(
            ['name'=>$this->name,'email'=>$this->email,'description'=>$this->description],
            ['name'=>'required','email'=>'required','description'=>'required'],
            ['name'=>'فیلد نام الزامی می باشد','description'=>'فیلد توضیحات الزامی می باشد','email'=>'فیلد ایمیل الزامی می باشد',],
        );
        Messages::create([
           'name'=>$this->name,
           'email'=>$this->email,
           'description'=>$this->description,
        ]);
        $this->name=null;
        $this->email=null;
        $this->description=null;
        $this->dispatch('alert',icon:'success',message:'پیام شما با موفقیت ارسال شد');
    }
    public function render()
    {
        return view('livewire.home.contact')->layout('layouts.home');
    }
}
