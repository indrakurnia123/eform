<?php

namespace App\Http\Livewire\Auth\Request;

use Livewire\Component;
use App\Models\Request;
use App\Models\RequestStatus;

class RequestFilter extends Component
{

    public $request_statuses;

    public function mount()
    {
        $this->request_statuses=RequestStatus::all();
    }

    public function render()
    {
        // dd($this->request_statuses);
        return view('livewire.auth.request.request-filter');
    }

    public function selectFilter($id)
    {
        $this->emit('filterSelected',$id);
    }
}
