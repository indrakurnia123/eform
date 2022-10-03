<?php

namespace App\Http\Livewire\Auth\Request;

use Livewire\Component;
use App\Models\Request as Req;

class RequestCard extends Component
{
    public $request;

    public $listeners=[
        'selectedFilter'=>'filterSelected',
        'updatedRequest'=>'$refresh'
    ];

    public function filterSelected($request)
    {

    }
    
    public function showEditModal()
    {
        $this->dispatchBrowserEvent('edit-request-modal');
    }

    public function mount($request)
    {
        $this->request=$request;
    }

    public function render()
    {
        return view('livewire.auth.request.request-card');
    }
}
