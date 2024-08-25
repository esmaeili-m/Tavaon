<?php

namespace App\Livewire\Admin\News;

use App\Models\News;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    public $title,$description,$fillter=[],$search=0;

    public function mount()
    {
        if (session()->has('alert')) {
            $this->dispatch('alert',icon:'success',message: session('alert') );
        }
    }
    public function status($id)
    {
        $data=News::find($id);
        if ($data->status){
            $data->update(['status'=>0]);
            $this->dispatch('alert',icon:'success',message: 'وضعیت خبر با موفقیت تغییر کرد' );

        }else{
            $data->update(['status'=>1]);
            $this->dispatch('alert',icon:'success',message: 'وضعیت خبر با موفقیت تغییر کرد' );
        }
    }

    public function delete($id)
    {
        $user=News::find($id)->delete();
        $this->dispatch('alert',icon:'success',message: ' خبر با موفقیت حذف شد' );

    }

    public function search_user()
    {
        $data = News::query();
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
        // حذف تگ‌های HTML
        $text = strip_tags($text);

        // اگر طول متن بیشتر از حد مجاز است
        if (mb_strlen($text) > $maxLength) {
            // محدود کردن متن به تعداد کاراکترهای مشخص شده و افزودن "..."
            $text = mb_substr($text, 0, $maxLength) . '...';
        }

        return $text;
    }
    public function render()
    {
        $data = News::orderBy('id', 'desc');
        if ($this->search) {
            $data = $data->whereIn('id', $this->fillter);
        }

        $data = $data->paginate(10);
        return view('livewire.admin.news.index',compact('data'));
    }
}
