<?php

namespace App\Http\Livewire\Auth\Request;

use Livewire\Component;
use App\Models\Request as Req;
use App\Repositories\HistoryKreditCij;
use App\Repositories\DataCij as Data;

class DataCij extends Component
{
    public $cijdatas;
    public $datas;
    public function mount($datas)
    {
        $this->datas=$datas;
        $history = new HistoryKreditCij;
        $this->cijdatas=$history->data($datas['request_number']);
        // dd($this->datas);
    }

    public function updateDataCij($id)
    {
        sleep(2);
        $datas = new Data;
        $data = $datas->data($this->datas->nik,$this->datas->request_number);
        // dd($data);
        if($data['status'])
        {
            Req::where('id','=',$this->datas->id)
            ->update(['nasabah_status_id'=>2]);
            $this->datas=Req::find($id);
        }else{
            Req::where('id','=',$this->datas->id)
            ->update(['nasabah_status_id'=>3]);
            $this->datas=Req::find($id);
        }
        $history = new HistoryKreditCij;
        $this->cijdatas=$history->data($data['data']['no_permohonan']);
    }

    public function render()
    {
        return view('livewire.auth.request.data-cij')->extends('layouts.app2');
    }
}