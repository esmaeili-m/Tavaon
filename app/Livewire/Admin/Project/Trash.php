<?php

namespace App\Livewire\Admin\Project;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;

class Trash extends Component
{
    use WithPagination;
    public $title,$description,$fillter=[],$search=0;
    public function restore($id)
    {
        $user=Post::onlyTrashed()->find($id)->restore();
        $this->dispatch('alert',icon:'success',message: ' پروژه با موفقیت بازگردانی شد' );
    }
    public function delete($id)
    {
        $user=Post::onlyTrashed()->find($id)->forceDelete();
        $this->dispatch('alert',icon:'success',message: ' پروژه با موفقیت حذف شد' );

    }
    public function search_user()
    {
        $data = Post::onlyTrashed();
        if ($this->title){
            $data=$data->where('title','LIKE','%'.$this->title.'%');
            $this->search=1;
        }
        if ($this->description){
            $data=$data->where('description','LIKE','%'.$this->description.'%');
            $this->search=1;
        }
        $this->fillter=$data->pluck('id');
    }
    public function truncateText($text, $maxLength = 50)
    {
        $text = strip_tags($text);
        if (mb_strlen($text) > $maxLength) {
            $text = mb_substr($text, 0, $maxLength) . '...';
        }

        return $text;
    }
    public function render()
    {
        $data = Post::onlyTrashed()->orderBy('id', 'desc');
        if ($this->search) {
            $data = $data->whereIn('id', $this->fillter);
        }
        $data = $data->paginate(10);
        return view('livewire.admin.project.trash',compact('data'));
    }
}
