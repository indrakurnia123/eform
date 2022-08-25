<?php

namespace App\Http\Livewire\Auth\Request;

use Livewire\Component;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use App\Models\Request as Req;

class Detail extends Component
{
    public $datas;
    public $cijdatas;
    public $cijdata_response;

    public function mount(Request $request)
    {
        $this->datas = Req::where('id','=',$request->id)->first();
    }

    public function render()
    {
        return view('livewire.auth.request-detail')->extends('layouts.app2');
    }
}
