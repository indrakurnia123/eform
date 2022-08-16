<?php

namespace App\Http\Livewire\Auth;

use Livewire\Component;
use App\Models\User;
use App\Models\Request;
use Auth;

class Dashboard extends Component
{
    public $users;
    public $requests;

    public function mount()
    {
        if(Auth::user()->role_id==1)
        {
            $this->users['all']=User::where('is_active',1)->count();
            $this->requests['all']=Request::all()->count();
            $this->requests['today']=Request::where('request_date',date('Y-m-d'))->count();
        }else{
            $this->users['all']=User::where('is_active',1)->where('office_id',Auth::user()->office_id)->count();
            $this->requests['all']=Request::where('office_id',Auth::user()->office_id)->count();
            $this->requests['today']=Request::where('request_date',date('Y-m-d'))->where('office_id',Auth::user()->office_id)->count();
        }
    }

    public function render()
    {
        return view('livewire.auth.dashboard')->extends('layouts.app2');
    }
}
