<?php

namespace App\Livewire\Admin\News;

use App\Models\News;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;
use Livewire\WithFileUploads;

class Update extends Component
{
    use WithFileUploads;
    public $title,$description,$news,$image,$slug;


    public function mount($id)
    {
        $this->news=News::find($id);
        $this->title=$this->news->title;
        $this->description=$this->news->description;
        $this->slug=$this->news->slug;
        $this->image=$this->news->logo;
    }
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
        $this->news->update([
            'title'=>$this->title,
            'slug'=>$this->slug,
            'description'=>$this->description,
            'logo'=>$this->image,
        ]);
        session()->flash('alert', 'خبر با موفقیت ویرایش شد');
        return redirect()->route('news.list');
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
        return view('livewire.admin.news.update');
    }
}
