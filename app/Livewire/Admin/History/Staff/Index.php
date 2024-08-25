<?php

namespace App\Livewire\Admin\History\Staff;

use App\Models\Staff;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    public $name,$description,$fillter=[],$search=0,$ids;
    public function mount($id)
    {
        $this->ids=$id;
        if (session()->has('alert')) {
            $this->dispatch('alert',icon:'success',message: session('alert') );
        }
    }
    public function delete($id)
    {
        $user=Staff::find($id)->delete();
        $this->dispatch('alert',icon:'success',message: ' کارمند  با موفقیت حذف شد' );

    }
    public function search_user()
    {
        $data = Staff::query();
        if ($this->name){
            $data=$data->where('name','LIKE','%'.$this->name.'%');
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
        $data = Staff::where('history_id',$this->ids)->orderBy('id', 'desc');
        if ($this->search) {
            $data = $data->whereIn('id', $this->fillter);
        }

        $data = $data->paginate(10);
        return view('livewire.admin.history.staff.index',compact('data'));
    }
}
