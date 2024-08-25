<?php

namespace App\Livewire\Admin\History;

use App\Models\History;
use App\Models\News;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    public $date,$description,$fillter=[],$search=0;

    public function mount()
    {
        if (session()->has('alert')) {
            $this->dispatch('alert',icon:'success',message: session('alert') );
        }
    }
    public function delete($id)
    {
        $user=History::find($id)->delete();
        $this->dispatch('alert',icon:'success',message: ' تاریخچه با موفقیت حذف شد' );

    }
    public function status($id)
    {
        $data=History::find($id);
        if ($data->status){
            $data->update(['status'=>0]);
            $this->dispatch('alert',icon:'success',message: 'وضعیت تاریخچه با موفقیت تغییر کرد' );

        }else{
            $data->update(['status'=>1]);
            $this->dispatch('alert',icon:'success',message: 'وضعیت تاریخچه با موفقیت تغییر کرد' );
        }
    }
    public function search_user()
    {
        $data = History::query();
        if ($this->date){
            $data=$data->where('date','LIKE','%'.$this->date.'%');
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
        $data = History::orderBy('id', 'desc');
        if ($this->search) {
            $data = $data->whereIn('id', $this->fillter);
        }

        $data = $data->paginate(10);
        return view('livewire.admin.history.index',compact('data'));
    }
}
