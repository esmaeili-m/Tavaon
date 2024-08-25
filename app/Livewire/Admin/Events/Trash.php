<?php

namespace App\Livewire\Admin\Events;

use App\Models\Events;
use App\Models\News;
use Livewire\Component;
use Livewire\WithPagination;

class Trash extends Component
{
    use WithPagination;
    public $title,$description,$fillter=[],$search=0;
    public function restore($id)
    {
        $user=Events::onlyTrashed()->find($id)->restore();
        $this->dispatch('alert',icon:'success',message: ' رویداد با موفقیت بازگردانی شد' );
    }
    public function delete($id)
    {
        $user=Events::onlyTrashed()->find($id)->forceDelete();
        $this->dispatch('alert',icon:'success',message: ' رویداد با موفقیت حذف شد' );

    }
    public function search_user()
    {
        $data = Events::onlyTrashed();
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
        $data = Events::onlyTrashed()->orderBy('id', 'desc');
        if ($this->search) {
            $data = $data->whereIn('id', $this->fillter);
        }
        $data = $data->paginate(10);
        return view('livewire.admin.events.trash',compact('data'));
    }
}
