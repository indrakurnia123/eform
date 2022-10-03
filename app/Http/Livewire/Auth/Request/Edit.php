<?php

namespace App\Http\Livewire\Auth\Request;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Events\RequestCreated;
use Illuminate\Http\Request;
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

class Edit extends Component
{
    use WithFileUploads;

    public $listeners = [
        'getRequest'=>'showRequest'
    ];

    public $request;
    public $request_id;
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

    public function mount(Request $request)
    {
        $request = Req::where('id','=',$request->id)->get();
        $this->request = $request[0];
        
        $this->request_date = date('Y-m-d');
        $this->office_id = Auth::user()->office->id;
        $this->request_status_id = 1;
        $this->genders = Gender::all();
        $this->provinces=Province::all();
        
        $this->request_id=$request[0]->id;
        $this->request=$request[0]->request;
        $this->nik=$request[0]->nik;
        $this->npwp=$request[0]->npwp;
        $this->name=$request[0]->name;
        $this->birth_place=$request[0]->birth_place;
        $this->birth_date=$request[0]->birth_date;
        $this->gender_id=$request[0]->gender_id;
        $this->address=$request[0]->address;
        $this->mother_name=$request[0]->mother_name;
        $this->phone=$request[0]->phone;
        $this->subdistrict_id=$request[0]->subdistrict_id;
        $this->district_id=$request[0]->district_id;
        $this->city_id=$request[0]->city_id;
        $this->province_id=$request[0]->province_id;
        $this->postcode=$request[0]->postcode;
        $this->request_date=$request[0]->request_date;
        $this->office_id=$request[0]->office_id;
        $this->request_status_id=$request[0]->request_status_id;
        // $this->foto_debitur=$request[0]->foto_debitur;
        // $this->foto_ktp=$request[0]->foto_ktp;
        $this->foto_debitur_resize=$request[0]->foto_debitur;
        $this->foto_ktp_resize=$request[0]->foto_ktp;
        $this->cities=City::where('province_id','=',$this->province_id)->get();
        $this->districts=District::where('city_id','=',$this->city_id)->get();
        $this->subdistricts=Subdistrict::where('district_id','=',$this->district_id)->get();
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

    public function update()
    {
        
        // $this->validate([
        //     'nik'=>['required','min:16'],
        //     'name'=>['required'],
        //     'birth_place'=>['required','regex:/^[a-zA-Z]+$/u'],
        //     'birth_date'=>'required',
        //     'address'=>'required',
        //     'phone'=>['required','numeric','min:10',new NoHpRule],
        //     'foto_debitur'=>'required|image:mimes:jpg,jpeg,png,gif,svg|max:2048',
        //     'foto_ktp'=>'required|image:mimes:jpg,jpeg,png,gif,svg|max:2048',
        //     'province_id'=>'required',
        //     'city_id'=>'required',
        //     'district_id'=>'required',
        //     'subdistrict_id'=>'required',
        //     'gender_id'=>'required'
        //     // 'postcode'=>'required'
        // ]);
        // dd('here');
        if($this->request_id)
        {
            $request = Req::find($this->request_id);
            $update = $request->update([
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
            if($update){
                session()->flash('success','Update Berhasil!');
                return redirect()->route('requests.index');
                event(new RequestCreated($update));
            }else{
                session()->flash('error','Update Gagal!');
                return redirect()->back()->withInput(Input::all());
            }
        }
    }

    public function resetInput()
    {
        $this->nik=null;
        $this->npwp=null;
        $this->name=null;
        $this->birth_place=null;
        $this->birth_date=null;
        $this->gender_id=null;
        $this->address=null;
        $this->mother_name=null;
        $this->phone=null;
        $this->subdistrict_id=null;
        $this->district_id=null;
        $this->city_id=null;
        $this->province_id=null;
        $this->postcode=null;
        $this->request_date=null;
        $this->office_id=null;
        $this->request_status_id=null;
        $this->foto_debitur=null;
        $this->foto_ktp=null;
        $this->foto_debitur_resize=null;
        $this->foto_ktp_resize=null;

    }

    public function render()
    {
        return view('livewire.auth.request.edit')->extends('layouts.app2');
    }
}
