<?php

namespace App\Http\Livewire\Auth\Request;

use Livewire\Component;
use App\Models\Request as Req;
use App\Models\NasabahStatus as Ns;
use App\Repositories\DataCij;

class NasabahStatus extends Component
{
    public $req;
    public function mount($id)
    {
        $this->req = Req::find($id);
    }

    public function updateDataCij($id)
    {
        sleep(1);
        $req = new DataCij;
        $data = $req->data($this->req->nik,$this->req->request_number);
        if($data['status'])
        {
            Req::where('id','=',$this->req->id)
            ->update(['nasabah_status_id'=>2]);
            $this->req=Req::find($id);
        }else{
            Req::where('id','=',$this->req->id)
            ->update(['nasabah_status_id'=>3]);
            $this->req=Req::find($id);
        }
    }
    public function render()
    {
        return view('livewire.auth.request.nasabah-status');
    }
}
