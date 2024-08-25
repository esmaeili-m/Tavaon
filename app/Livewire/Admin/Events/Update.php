<?php

namespace App\Livewire\Admin\Events;

use App\Models\Events;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;
use Livewire\WithFileUploads;

class Update extends Component
{
    use WithFileUploads;
    public $title,$description,$time,$event,$logo;

    public function UpdatedLogo()
    {
        $this->logo=uploadFile($this->logo,'News');

    }
    public function mount($id)
    {
        $this->event=Events::find($id);
        $this->title=$this->event->title;
        $this->time=$this->event->time;
        $this->description=$this->event->description;
        $this->logo=$this->event->logo;
    }
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
        );;
        $this->event->update([
            'title'=>$this->title,
            'time'=>$this->time,
            'description'=>$this->description,
            'logo'=>$this->logo,
        ]);
        session()->flash('alert', 'خبر با موفقیت ایجاد شد');
        return redirect()->route('news.list');
    }
    public function render()
    {
        return view('livewire.admin.events.update');
    }
}
