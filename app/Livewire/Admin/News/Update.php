<?php

namespace App\Livewire\Admin\News;

use App\Models\News;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;
use Livewire\WithFileUploads;

class Update extends Component
{
    use WithFileUploads;
    public $title,$description,$news,$logo;

    public function UpdatedLogo()
    {
        $this->logo=uploadFile($this->logo,'News');

    }
    public function mount($id)
    {
        $this->news=News::find($id);
        $this->title=$this->news->title;
        $this->description=$this->news->description;
        $this->logo=$this->news->logo;
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
        $this->news->update([
            'title'=>$this->title,
            'description'=>$this->description,
            'logo'=>$this->logo,
        ]);
        session()->flash('alert', 'خبر با موفقیت ویرایش شد');
        return redirect()->route('news.list');
    }
    public function render()
    {
        return view('livewire.admin.news.update');
    }
}
