<?php

namespace App\Http\Livewire\Auth\Request;

use Livewire\Component;
use App\Models\Request as Req;
use App\Models\RequestStatus;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;
use Auth;

class Index extends Component
{
    public $requests;
    public $request_statuses;
    public $filter;
    public $filters;
    public $filtersAll;
    public $filterCount;

    public function mount()
    {
        
    }
    public function changeFilter($id=null)
    {
        $this->filter=$id;
    }
    public function render()
    {
        $this->filtersAll=Req::select(DB::raw('count(*) as jml'),DB::raw('"all" as request_status'))->get();
        $this->filters=Req::select(DB::raw('count(id) as jml'),'request_status_id')->groupBy('request_status_id')->get();
        if(Auth::user()->role_id==1)
        {
            if(!$this->filter==null){
                $this->requests=Req::select('id')->where('request_status_id','=',$this->filter)->get();   
            }else{
                $this->requests=Req::select('id')->get();   
            }
        }else{
            if(!$this->filter==null){
                $this->requests=Req::where('office_id',Auth::user()->office_id)->where('request_status_id','=',$this->filter)->get();   
            }else{
                $this->requests=Req::where('office_id',Auth::user()->office_id)->get();  
            }
            
        }
        return view('livewire.auth.request.index')->extends('layouts.app2');
    }
}
