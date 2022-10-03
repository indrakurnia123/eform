<?php

namespace App\Http\Livewire\Auth\Request;

use Livewire\Component;
use App\Models\Request;
use App\Models\RequestStatus;

class RequestCount extends Component
{
    public $count;
    public $badge;

    public function mount($request_status_id)
    {
        $request = Request::where('request_status_id','=',$request_status_id)->get();
        $request_status = RequestStatus::find($request_status_id);
        $this->count=$request->count();
        $this->badge=$request_status->badge;
        // dd($this->badge);
    }
    public function render()
    {
        return view('livewire.auth.request.request-count');
    }
}
