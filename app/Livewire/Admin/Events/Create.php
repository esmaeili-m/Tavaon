<?php

namespace App\Livewire\Admin\Events;

use App\Models\Events;
use App\Models\News;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;
    public $title,$description,$logo,$phone,$time,$role=1,$password;
    public function save(){
        Validator::validate(
            [
                'title' => $this->title,
                'time' => $this->time,

            ],
            [
                'title' => 'required',
                'time' => 'required',

            ],
            [
                'title.required' => 'این فیلد الزامی می باشد',
                'time.required' => 'این فیلد الزامی می باشد',

            ],
        );
        if ($this->logo){
            $file=uploadFile($this->logo,'Events');
        }else{
            $file='panel/assets/images/event.jpg';
        }
        $order= Events::max('order') == 0 ? 1 : Events::max('order')+1;
        Events::create([
            'title'=>$this->title,
            'description'=>$this->description,
            'author'=>1,
            'time'=>$this->time,
            'order'=>$order,
            'logo'=>$file,
        ]);
        session()->flash('alert', 'رویداد با موفقیت ایجاد شد');
        return redirect()->route('event.list');
    }

    public function render()
    {

        return view('livewire.admin.events.create');
    }
}
