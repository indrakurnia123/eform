<?php

namespace App\Http\Livewire\Auth;

use Livewire\Component;
use App\Models\Request as Req;
use App\Models\Province;
use App\Models\City;
use App\Models\District;
use App\Models\Subdistrict;
use App\Rules\NpwpRule;
use Auth;

class Request extends Component
{
    public $request_number;
    public $nik;
    public $npwp;
    public $name;
    public $birth_place;
    public $birth_date;
    public $address;
    public $mother_name;
    public $phone;
    public $subdistrict_id;
    public $district_id;
    public $city_id;
    public $province_id;
    public $postcode;
    public $request_date;
    public $office_id;
    public $request_status_id;

    public $provinces;
    public $cities;
    public $districts;
    public $subdistricts;

    public function mount()
    {
        $this->request_date = date('Y-m-d');
        $this->office_id = Auth::user()->office->id;
        $this->request_status_id = 1;

        // $this->provinces=Province::all();
    }

    public function store()
    {

        $this->validate([
            'request_number'=>'required|unique:requests',
            'nik'=>['required','min:16'],
            // 'npwp'=>['required','min:16',new NpwpRule()],
            'name'=>'required',
            'birth_place'=>'required',
            'birth_date'=>'required',
            'address'=>'required',
            'phone'=>['required','min:10'],
            // 'province_id'=>'required',
            // 'city_id'=>'required',
            // 'district_id'=>'required',
            // 'subdistrict_id'=>'required',
            // 'postcode'=>'required'
        ]);

        $req = Req::create([
            'request_number'=>$this->request_number,
            'nik'=>$this->nik,
            'npwp'=>$this->npwp,
            'name'=>$this->name,
            'birth_place'=>$this->birth_place,
            'birth_date'=>$this->birth_date,
            'address'=>$this->address,
            // 'mother_name'=>$this->mother_name,
            'phone'=>$this->phone,
            // 'province_id'=>$this->province_id,
            // 'city_id'=>$this->city_id,
            // 'district_id'=>$this->district_id,
            // 'subdistrict_id'=>$this->subdistrict_id,
            // 'postcode'=>$this->postcode,
            'request_date'=>$this->request_date,
            'office_id'=>$this->office_id,
            'request_status_id'=>$this->request_status_id,
        ]);

        if($req){
            session()->flash('success','Registrasi Berhasil!');
            return redirect()->route('auth.request.add');
        }else{
            session()->flash('error','Request Gagal!');
            return redirect()->back()->withInput(Input::all());
        }
    }

    public function render()
    {
        return view('livewire.auth.request')->extends('layouts.app2');
    }
}
