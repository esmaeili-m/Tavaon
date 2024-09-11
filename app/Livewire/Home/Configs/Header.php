<?php

namespace App\Livewire\Home\Configs;

use Livewire\Component;

class Header extends Component
{
    public function logout()
    {
        auth()->logout();
        return redirect('/');
    }
    public function render()
    {
        return view('livewire.home.configs.header');
    }
}
