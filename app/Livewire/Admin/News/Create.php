<?php

namespace App\Livewire\Admin\News;

use App\Models\News;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;
    public $title,$description,$logo,$phone,$role=1,$password;
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
        if ($this->logo){
            $file=uploadFile($this->logo,'News');
        }else{
            $file='panel/assets/images/animation-bg.jpg';
        }
        $order= News::max('order') == 0 ? 1 : News::max('order')+1;
        News::create([
            'title'=>$this->title,
            'description'=>$this->description,
            'author'=>1,
            'order'=>$order,
            'logo'=>$file,
        ]);
        session()->flash('alert', 'خبر با موفقیت ایجاد شد');
        return redirect()->route('news.list');
    }

    public function render()
    {
        return view('livewire.admin.news.create');
    }
}
