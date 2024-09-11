<?php

namespace App\Livewire\Admin\Chat;

use App\Models\Chats;
use App\Models\User;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        $data = User::whereHas('latestChat', function($query) {
            $query->where('seen', false);
        })->with(['latestChat' => function($query) {
            $query->where('seen', false);
        }])->get();
        return view('livewire.admin.chat.index',compact('data'));
    }
}
