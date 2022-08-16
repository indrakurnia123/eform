<?php

namespace App\Http\Livewire\Auth;

use Livewire\Component;
use App\Models\Request as Req;
use Auth;

class ListRequest extends Component
{
    public $requests;

    public function mount()
    {
        if(Auth::user()->role_id==1)
        {
            $this->requests=Req::all();        
        }else{
            $this->requests=Req::where('office_id',Auth::user()->office_id)->get();
        }
    }
    public function render()
    {
        return view('livewire.auth.list-request')->extends('layouts.app2');
    }
}
