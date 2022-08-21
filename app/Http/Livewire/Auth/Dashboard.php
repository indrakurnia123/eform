<?php

namespace App\Http\Livewire\Auth;

use Livewire\Component;
use App\Models\User;
use App\Models\Request;
use App\Models\Month;
use Illuminate\Support\Facades\DB;
use Auth;

class Dashboard extends Component
{
    public $users;
    public $requests;
    public $request_stats;
    public $request_reject;
    public $request_acc;
    public $card_title;
    public $card_title_reject;
    public $card_title_acc;
    public $sumdatas;
    public $sumdata_rejects;
    public $sumdata_acc;
    public $subtitle;
    public $month;

    public function mount()
    {
        $this->card_title="Data Request";
        $this->card_title_reject="Data Reject";
        $this->card_title_acc="Data Acc";
        if(Auth::user()->role_id==1)
        {
            $this->subtitle = "Total Request";
            $date_number = date("m");
            $this->month = Month::where('number','=',$date_number)->first();
            // dd($month);
            $this->users['all']=User::where('is_active',1)->count();
            $this->requests['all']=Request::all()->count();
            $this->requests['today']=Request::where('request_date',date('Y-m-d'))->count();
            $this->request_stats=DB::table('requests')
            ->join('request_statuses','requests.request_status_id','=','request_statuses.id')
            ->select(DB::raw('count(requests.id) as jml'),'request_statuses.name as name')
            ->where(DB::raw('MONTH(request_date)'),'=',(int)$this->month->number)
            ->groupBy('name')
            ->get();
            $this->request_reject=DB::table('requests')
            ->join('offices','requests.office_id','=','offices.id')
            ->select(DB::raw('count(requests.id) as jml'),'offices.shortname as name')
            ->where(DB::raw('MONTH(request_date)'),'=',(int)$this->month->number)
            ->where('requests.request_status_id','=',4)
            ->groupBy('name')
            ->get();
            $this->request_acc=DB::table('requests')
            ->join('offices','requests.office_id','=','offices.id')
            ->select(DB::raw('count(requests.id) as jml'),'offices.shortname as name')
            ->where(DB::raw('MONTH(request_date)'),'=',(int)$this->month->number)
            ->where('requests.request_status_id','=',3)
            ->groupBy('name')
            ->get();
            $this->sumdatas = DB::table('requests')
            ->select(DB::raw('count(id) as jml'))
            ->where(DB::raw('MONTH(request_date)'),'=',(int)$this->month->number)
            ->get();
            $this->sumdata_rejects = DB::table('requests')
            ->select(DB::raw('count(id) as jml'))
            ->where(DB::raw('MONTH(request_date)'),'=',(int)$this->month->number)
            ->where('requests.request_status_id','=',4)
            ->get();
            $this->sumdata_acc = DB::table('requests')
            ->select(DB::raw('count(id) as jml'))
            ->where(DB::raw('MONTH(request_date)'),'=',(int)$this->month->number)
            ->where('requests.request_status_id','=',3)
            ->get();
        }else{
            $this->users['all']=User::where('is_active',1)->where('office_id',Auth::user()->office_id)->count();
            $this->requests['all']=Request::where('office_id',Auth::user()->office_id)->count();
            $this->requests['today']=Request::where('request_date',date('Y-m-d'))->where('office_id',Auth::user()->office_id)->count();
            $this->request_stats=DB::table('requests')
            ->join('request_statuses','requests.request_status_id','=','request_statuses.id')
            ->select(DB::raw('count(requests.id) as jml'),'request_statuses.name as name')
            ->where(DB::raw('MONTH(request_date)'),'=',(int)$this->month->number)
            ->where('requests.request_status_id','=',4)
            ->where('requests.office_id','=',Auth::user()->office_id)
            ->groupBy('name')
            ->get();
            $this->request_reject=DB::table('requests')
            ->join('offices','requests.office_id','=','offices.id')
            ->select(DB::raw('count(requests.id) as jml'),'offices.shortname as name')
            ->where(DB::raw('MONTH(request_date)'),'=',(int)$this->month->number)
            ->where('requests.request_status_id','=',3)
            ->where('requests.office_id','=',Auth::user()->office_id)
            ->groupBy('name')
            ->get();
            $this->request_acc=DB::table('requests')
            ->join('offices','requests.office_id','=','offices.id')
            ->select(DB::raw('count(requests.id) as jml'),'offices.shortname as name')
            ->where(DB::raw('MONTH(request_date)'),'=',(int)$this->month->number)
            ->where('requests.request_status_id=4')
            ->where('requests.office_id','=',Auth::user()->office_id)
            ->groupBy('name')
            ->get();
            $this->sumdatas = DB::table('requests')
            ->select(DB::raw('count(id) as jml'))
            ->where(DB::raw('MONTH(request_date)'),'=',(int)$this->month->number)
            ->where('requests.office_id','=',Auth::user()->office_id)
            ->get();
            $this->sumdata_rejects = DB::table('requests')
            ->select(DB::raw('count(id) as jml'))
            ->where(DB::raw('MONTH(request_date)'),'=',(int)$this->month->number)
            ->where('requests.request_status_id','=',4)
            ->where('requests.office_id','=',Auth::user()->office_id)
            ->get();
            $this->sumdata_acc = DB::table('requests')
            ->select(DB::raw('count(id) as jml'))
            ->where(DB::raw('MONTH(request_date)'),'=',(int)$this->month->number)
            ->where('requests.request_status_id','=',3)
            ->where('requests.office_id','=',Auth::user()->office_id)
            ->get();
        }
    }

    public function render()
    {
        return view('livewire.auth.dashboard')->extends('layouts.app2');
    }
}
