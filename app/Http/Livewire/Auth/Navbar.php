<?php

namespace App\Http\Livewire\Auth;

use Livewire\Component;
use Auth;

class Navbar extends Component
{
    public $username;
    public $userImage;

    public function mount()
    {
        $this->username = Auth::user()->name;
        $this->userImage = Auth::user()->image;
    }

    public function render()
    {
        return view('livewire.auth.navbar');
    }
}
