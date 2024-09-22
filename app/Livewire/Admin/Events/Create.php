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
    public $title,$description,$logo,$phone,$time,$role=1,$password,$image,$slug;
    public function save(){
        Validator::validate(
            [
                'title' => $this->title,
                'time' => $this->time,
                'slug' => $this->slug,

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
        );
        Events::create([
            'title'=>$this->title,
            'logo'=>$this->image,
            'slug'=>$this->slug,
            'description'=>$this->description,
            'author'=>1,
            'time'=>$this->time,
            'order'=>$this->get_order(),
        ]);
        session()->flash('alert', 'رویداد با موفقیت ایجاد شد');
        return redirect()->route('event.list');
    }
    public function get_order()
    {
        $max=Events::max('order');
        return $max == 0 ? $max=1 : $max+1;
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

        return view('livewire.admin.events.create');
    }
}
