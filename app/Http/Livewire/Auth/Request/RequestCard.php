<?php

namespace App\Http\Livewire\Auth\Request;

use Livewire\Component;
use App\Models\Request as Req;

class RequestCard extends Component
{
    public $request;

    public function mount($id)
    {
        $this->request=Req::where('id','=',$id)->first();
    }

    public function render()
    {
        return view('livewire.auth.request.request-card');
    }
}
