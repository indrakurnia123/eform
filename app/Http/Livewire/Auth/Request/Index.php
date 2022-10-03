<?php

namespace App\Http\Livewire\Auth\Request;

use Livewire\Component;
use Livewire\WithPagination;
use App\Events\RequestCreated;
use App\Events\Hello;
use App\Models\Request as Req;
use App\Models\RequestStatus;
use App\Models\ViciScore;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;
use Auth;

class Index extends Component
{
    use WithPagination;

    public $filter;
    public $requests;
    public $verificationData;
    public $gradeData;

    protected $paginationTheme = 'bootstrap';
    
    public function requestUpdated($request)
    {   
        session()->flash('success','Berhasil Update Data Pemohon'. $request['name']);
    }

    public function mount()
    {
        $this->verificationData=json_encode(["data"=>"data Scoring tidak ditemukan"]);
        $this->gradeData=json_encode(["data"=>"data Scoring tidak ditemukan"]);
    }

    public function selectedStatus($id)
    {
       $this->filter=$id;
       $this->render();
    }
    
    public function getRequest($id)
    {
        $request = Req::where('id','=',$id)->get();
        $this->emit('getRequest',$request);
    }

    public function checkVerification($id)
    {
        // dd($id);
        $this->dispatchBrowserEvent('show-verification-modal');
        $request = Req::find($id);
        if($request->request_reff_id)
        {
            $score = ViciScore::where('request_reff_id','=',$request->request_reff_id)->get();
            $this->verificationData = json_encode(json_decode($score[0]->data,true),true);
        }else{
            $this->verificationData = json_encode(["data"=>"data Verification tidak ditemukan"]);
        }
    }

    public function checkGradeRecomendation($id)
    {
        // dd($id);
        $this->dispatchBrowserEvent('show-grade-modal');
        $request = Req::find($id);
        if($request->request_reff_id)
        {
            $score = ViciScore::where('request_reff_id','=',$request->request_reff_id)->get();
            $this->gradeData = json_encode(json_decode($score[0]->data,true),true);
        }else{
            $this->gradeData = json_encode(["data"=>"data Grade tidak ditemukan"]);
        }       
    }

    public function render()
    {
        if($this->filter!=null){
            $this->requests=Req::where('request_status_id','=',$this->filter)->get();
        }else{
            // $this->requests=Req::all();
            $this->requests=Req::all();
            // dd($this->requests);
        }
        // event(new RequestCreated($this->requests[0]->request_number));
        return view('livewire.auth.request.index')->extends('layouts.app2');
    }
}
