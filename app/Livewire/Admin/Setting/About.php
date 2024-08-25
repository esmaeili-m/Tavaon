<?php

namespace App\Livewire\Admin\Setting;

use App\Models\Setting;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;

class About extends Component
{
    public $description;

    public function save()
    {
        Validator::validate(
            [
                'description' => $this->description,

            ],
            [
                'description' => 'required',

            ],
            [
                'description.required' => 'این فیلد الزامی می باشد',

            ],
        );
        Setting::updateOrCreate(
            ['type' => 1],
            ['value' => $this->description]
        );
        return $this->dispatch('alert',icon:'success',message:'متن درباره ما با موفقیت بروز رسانی شد');
    }
    public function mount(){
        $data=Setting::where('type',1)->first();
        $this->description=$data->value ?? '';
    }
    public function render()
    {
        return view('livewire.admin.setting.about');
    }
}
