<?php

namespace App\Livewire\Home;

use App\Models\Chats;
use Livewire\Component;

class Chat extends Component
{
    public $messages = [];
    public $newMessage;
    public $update_message=0,$last_chat;

    public function sendMessage()
    {
        if (!empty($this->newMessage)) {
            if ($this->update_message){
                $this->last_chat->update([
                   'message'=>filter_var($this->newMessage, FILTER_SANITIZE_STRING)
                ]);
            }else{
                Chats::create([
                    'user_id'=>auth()->user()->id,
                    'message'=>filter_var($this->newMessage, FILTER_SANITIZE_STRING),
                ]);
            }

            $this->newMessage = '';
            $this->update_message =0;

        }
    }

    public function update_last_message()
    {
        $this->last_chat=Chats::where('user_id',auth()->user()->id)->where('is_admin',0)->latest()->first();
        $this->update_message=1;
        $this->newMessage=$this->last_chat->message;
    }

    public function delete_message()
    {
        $message=Chats::where('user_id',auth()->user()->id)->where('is_admin',0)->latest()->first()->delete();

    }
    public function render()
    {
        $this->messages=Chats::where('user_id',auth()->user()->id)->get();
        return view('livewire.home.chat')->layout('layouts.home');
    }
}
