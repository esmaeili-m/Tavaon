<?php

namespace App\Livewire\Admin\Setting;

use App\Models\Setting;
use Livewire\Component;

class Contact extends Component
{
    public $phone,$email,$address;
    public function save()
    {
        if ($this->phone){
            Setting::updateOrCreate(
                ['type' => 2],
                ['value' => $this->phone]
            );
        }
        if ($this->email){
            Setting::updateOrCreate(
                ['type' => 3],
                ['value' => $this->email]
            );
        }
        if ($this->address){
            Setting::updateOrCreate(
                ['type' => 4],
                ['value' => $this->address]
            );
        }
        return $this->dispatch('alert',icon:'success',message:'اطلاعات با موفقیت بروز رسانی شد');

    }
    public function mount(){
        $data=Setting::whereIn('type',[2,3,4])->get();
        $this->phone=$data->where('type',2)->first()['value'] ?? '';
        $this->email=$data->where('type',3)->first()['value'] ?? '';
        $this->address=$data->where('type',4)->first()['value'] ?? '';
    }
    public function render()
    {
        return view('livewire.admin.setting.contact');
    }
}
