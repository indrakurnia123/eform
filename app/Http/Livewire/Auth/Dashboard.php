<?php

namespace App\Http\Livewire\Auth;

use Livewire\Component;
use App\Models\User;
use App\Models\Request;

class Dashboard extends Component
{
    public $users;
    public $requests;

    public function mount()
    {
        $this->users['all']=User::where('is_active',1)->count();
        $this->requests['all']=Request::all()->count();
        $this->requests['today']=Request::where('request_date',date('Y-m-d'))->count();
    }

    public function render()
    {
        return view('livewire.auth.dashboard')->extends('layouts.app2');
    }
}
