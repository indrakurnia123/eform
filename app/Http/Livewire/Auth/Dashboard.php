<?php

namespace App\Http\Livewire\Auth;

use Livewire\Component;

class Dashboard extends Component
{
    public function render()
    {
        return view('livewire.auth.dashboard')->extends('layouts.app2');
    }
}
