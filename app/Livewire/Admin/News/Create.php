<?php

namespace App\Livewire\Admin\News;

use App\Models\News;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;
    public $title,$description,$logo,$phone,$role=1,$slug,$image;
    public function save(){
        Validator::validate(
            [
                'title' => $this->title,
                'slug' => $this->slug,

            ],
            [
                'title' => 'required',
                'slug' => 'required',

            ],
            [
                'title.required' => 'این فیلد الزامی می باشد',
                'slug.required' => 'این فیلد الزامی می باشد',

            ],
        );

        News::create([
            'title'=>$this->title,
            'slug'=>$this->slug,
            'description'=>$this->description,
            'author'=>auth()->user()->id,
            'order'=>$this->get_order(),
            'logo'=>$this->image,
        ]);
        session()->flash('alert', 'خبر با موفقیت ایجاد شد');
        return redirect()->route('news.list');
    }
    public function get_order()
    {
        $max=News::max('order');
        return $max == 0 ? $max=1 : $max+1;
    }
    public function UpdatedImage()
    {
        $this->image=uploadFile($this->image,'News');
        return $this->image;
    }
    public function UpdatedSlug()
    {
        $this->slug=str_replace(' ','-',$this->slug);
        return $this->slug;
    }
    public function render()
    {
        return view('livewire.admin.news.create');
    }
}
