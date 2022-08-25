<?php

namespace App\Http\Livewire\Auth\Request;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\DB;
use App\Repositories\ImageRepository;
use App\Models\Request as Req;
use App\Models\Province;
use App\Models\City;
use App\Models\District;
use App\Models\Subdistrict;
use App\Models\Gender;
use App\Rules\NpwpRule;
use App\Rules\NoHpRule;
use Auth;
use Image;
use File;

class Create extends Component
{
    use WithFileUploads;

    public $request_number;
    public $nik;
    public $npwp;
    public $name;
    public $birth_place;
    public $birth_date;
    public $gender_id;
    public $address;
    public $mother_name;
    public $phone;
    public $subdistrict_id;
    public $district_id;
    public $city_id;
    public $province_id=null;
    public $postcode;
    public $request_date;
    public $office_id;
    public $request_status_id;
    public $foto_debitur;
    public $foto_ktp;
    public $foto_debitur_resize;
    public $foto_ktp_resize;

    public $genders;
    public $provinces;
    public $cities;
    public $districts;
    public $subdistricts;

    public function mount()
    {
        $this->request_date = date('Y-m-d');
        $this->office_id = Auth::user()->office->id;
        $this->request_status_id = 1;
        $this->genders = Gender::all();
        $this->provinces=Province::all();
        $this->districts=[];
        $this->subdistricts=[];
    }

    public function updatedFotoDebitur()
    {
        $foto_debitur_resize = new ImageRepository;
        $foto_debitur_path = $foto_debitur_resize->fitImageUploads($this->foto_debitur,'img/foto_debitur');
        $this->foto_debitur_resize=$foto_debitur_path;
    }

    public function updatedFotoKtp()
    {
        $foto_ktp_resize = new ImageRepository;
        $foto_ktp_path = $foto_ktp_resize->fitImageUploads($this->foto_ktp,'img/foto_debitur');

        $this->foto_ktp_resize=$foto_ktp_path;
    }

    public function clearUploadFoto()
    {
        if(File::exists(public_path($this->foto_debitur_resize)))
        {
            File::delete(public_path($this->foto_debitur_resize));
        }else{
            'file not found';
        }
        $this->foto_debitur_resize=null;
    }
    public function clearUploadKtp()
    {
        if(File::exists(public_path($this->foto_ktp_resize)))
        {
            File::delete(public_path($this->foto_ktp_resize));
        }else{
            'file not found';
        }
        $this->foto_ktp_resize=null;
    }

    public function updatedProvinceId()
    {
        
            $this->cities = City::where('province_id','=',$this->province_id)->get();
    }
    public function updatedCityId()
    {
        
            $this->districts = District::where('city_id','=',$this->city_id)->get();
    }
    public function updatedDistrictId()
    {
        $this->subdistricts = Subdistrict::where('district_id','=',$this->district_id)->get();
    }

    public function store()
    {
        $request_number=DB::select('select getNextRequestNumber('.Auth::user()->office_id.') as request_number');
        $this->request_number=$request_number[0]->request_number;
        $this->validate([
            'nik'=>['required','min:16'],
            'name'=>['required'],
            'birth_place'=>['required','regex:/^[a-zA-Z]+$/u'],
            'birth_date'=>'required',
            'address'=>'required',
            'phone'=>['required','numeric','min:10',new NoHpRule],
            'foto_debitur'=>'required|image:mimes:jpg,jpeg,png,gif,svg|max:2048',
            'foto_ktp'=>'required|image:mimes:jpg,jpeg,png,gif,svg|max:2048',
            'province_id'=>'required',
            'city_id'=>'required',
            'district_id'=>'required',
            'subdistrict_id'=>'required',
            'gender_id'=>'required'
            // 'postcode'=>'required'
        ]);
        $req = Req::create([
            'request_number'=>$this->request_number,
            'nik'=>$this->nik,
            'npwp'=>$this->npwp,
            'name'=>$this->name,
            'birth_place'=>$this->birth_place,
            'birth_date'=>$this->birth_date,
            'gender_id'=>$this->gender_id,
            'address'=>$this->address,
            'mother_name'=>$this->mother_name,
            'phone'=>$this->phone,
            'province_id'=>$this->province_id,
            'city_id'=>$this->city_id,
            'district_id'=>$this->district_id,
            'subdistrict_id'=>$this->subdistrict_id,
            // 'postcode'=>$this->postcode,
            'request_date'=>$this->request_date,
            'office_id'=>$this->office_id,
            'request_status_id'=>$this->request_status_id,
            'foto_debitur'=>$this->foto_debitur_resize,
            'foto_ktp'=>$this->foto_ktp_resize
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
        return view('livewire.auth.request.create')->extends('layouts.app2');
    }
}
