<?php

namespace App\Livewire\Admin\Chat;

use App\Models\Chats;
use Livewire\Component;

class Create extends Component
{
    public $messages = [];
    public $newMessage,$ids,$user;
    public $update_message=0,$last_chat;

    public function mount($id)
    {
        $this->ids=$id;
        $this->user=\App\Models\User::find($id);
        Chats::where('user_id',$this->ids)->update([
            'seen'=>1
        ]);
    }
    public function sendMessage()
    {
        if (!empty($this->newMessage)) {
            if ($this->update_message){
                $this->last_chat->update([
                    'message'=>$this->newMessage
                ]);
            }else{
                Chats::create([
                    'user_id'=>auth()->user()->id,
                    'message'=>filter_var($this->newMessage, FILTER_SANITIZE_STRING),
                    'is_admin'=>1,
                ]);
            }

            $this->newMessage = '';
            $this->update_message = 0;

        }
    }
    public function update_last_message($id)
    {
        $this->last_chat=Chats::find($id);
        $this->update_message=1;
        $this->newMessage=$this->last_chat->message;
    }

    public function delete_message($id)
    {
        $message=Chats::find($id)->delete();

    }
    public function render()
    {
        $this->messages=Chats::where('user_id',$this->ids)->get();
        return view('livewire.admin.chat.create');
    }
}
