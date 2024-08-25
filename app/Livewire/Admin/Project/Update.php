<?php

namespace App\Livewire\Admin\Project;

use App\Models\Post;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;
use Livewire\WithFileUploads;

class Update extends Component
{
    use WithFileUploads;
    public $title,$description,$post,$logo;

    public function UpdatedLogo()
    {
        $this->logo=uploadFile($this->logo,'Post');

    }
    public function mount($id)
    {
        $this->post=Post::find($id);
        $this->title=$this->post->title;
        $this->description=$this->post->description;
        $this->logo=$this->post->logo;
    }
    public function save(){
        Validator::validate(
            [
                'title' => $this->title,

            ],
            [
                'title' => 'required',

            ],
            [
                'title.required' => 'این فیلد الزامی می باشد',

            ],
        );
        $this->post->update([
            'title'=>$this->title,
            'description'=>$this->description,
            'logo'=>$this->logo,
        ]);
        session()->flash('alert', 'پروژه با موفقیت ایجاد شد');
        return redirect()->route('post.list');
    }
    public function render()
    {
        return view('livewire.admin.project.update');
    }
}
