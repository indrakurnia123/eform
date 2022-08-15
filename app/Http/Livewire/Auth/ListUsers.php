<?php

namespace App\Http\Livewire\Auth;

use Livewire\Component;
use App\Models\User;

class ListUsers extends Component
{
    public $users;
    public function mount()
    {
        $this->users = User::all();

    }

    public function render()
    {
        return view('livewire.auth.list-users')->extends('layouts.app2');
    }
}
