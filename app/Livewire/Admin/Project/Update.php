<?php

namespace App\Livewire\Admin\Project;

use App\Models\Post;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;
use Livewire\WithFileUploads;

class Update extends Component
{
    use WithFileUploads;
    public $title,$description,$post,$image,$slug;

    public function UpdatedLogo()
    {
        $this->image=uploadFile($this->logo,'Post');

    }
    public function mount($id)
    {
        $this->post=Post::find($id);
        $this->title=$this->post->title;
        $this->slug=$this->post->slug;
        $this->description=$this->post->description;
        $this->image=$this->post->logo;
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
        $this->post->update([
            'title'=>$this->title,
            'slug'=>$this->slug,
            'description'=>$this->description,
            'logo'=>$this->image,
        ]);
        session()->flash('alert', 'پروژه با موفقیت ایجاد شد');
        return redirect()->route('post.list');
    }
    public function UpdatedSlug()
    {
        $this->slug=str_replace(' ','-',$this->slug);
        return $this->slug;
    }
    public function UpdatedImage()
    {
        $this->image=uploadFile($this->image,'projects');
        return $this->image;
    }
    public function render()
    {
        return view('livewire.admin.project.update');
    }
}
