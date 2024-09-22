<?php

namespace App\Livewire\Admin\Events;

use App\Models\Events;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;
use Livewire\WithFileUploads;

class Update extends Component
{
    use WithFileUploads;
    public $title,$description,$time,$event,$image,$slug;

    public function mount($id)
    {
        $this->event=Events::find($id);
        $this->title=$this->event->title;
        $this->slug=$this->event->slug;
        $this->time=$this->event->time;
        $this->description=$this->event->description;
        $this->image=$this->event->logo;
    }
    public function save(){
        Validator::validate(
            [
                'title' => $this->title,
                'time' => $this->time,
                'slug' => $this->time,

            ],
            [
                'title' => 'required',
                'time' => 'required',
                'slug' => 'required',

            ],
            [
                'title.required' => 'این فیلد الزامی می باشد',
                'time.required' => 'این فیلد الزامی می باشد',
                'slug.required' => 'این فیلد الزامی می باشد',

            ],
        );;
        $this->event->update([
            'title'=>$this->title,
            'time'=>$this->time,
            'slug'=>$this->slug,
            'description'=>$this->description,
            'logo'=>$this->image,
        ]);
        session()->flash('alert', 'رویداد با موفقیت ایجاد شد');
        return redirect()->route('event.list');
    }
    public function UpdatedImage()
    {
        $this->image=uploadFile($this->image,'events');
        return $this->image;
    }
    public function UpdatedSlug()
    {
        $this->slug=str_replace(' ','-',$this->slug);
        return $this->slug;
    }
    public function render()
    {
        return view('livewire.admin.events.update');
    }
}
