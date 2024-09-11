<?php

namespace App\Livewire\Admin\Seo;

use App\Models\Seo;
use Livewire\Component;

class Create extends Component
{
    public function save()
    {
        $this->validate();
        Seo::create([
           'page_id'=>$this->id
        ]);
    }
    public function render()
    {

        return view('livewire.admin.seo.create');
    }
}
