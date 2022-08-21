<?php

namespace App\Http\Livewire\Auth;

use Livewire\Component;
use Illuminate\Support\Facades\Http;

class RequestDetail extends Component
{
    public $datas;
    public $cijdatas;


    

    public function detail($nik)
    {
        $response = Http::withToken('eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxIiwianRpIjoiODJhYjE2ZDMxYzYwMWU5Nzg2YWIwMzViMjM3OWVmMjNhNGU1NWFkNDRmMmQwNTE0MGJhMDFjMjllZDI3MDIyYzEwM2YyM2Q3Yzk2MWVkZTciLCJpYXQiOjE2NjA4MTk1OTYuMDczMTYxLCJuYmYiOjE2NjA4MTk1OTYuMDczMTY0LCJleHAiOjE2OTIzNTU1OTYuMDY4MTM2LCJzdWIiOiIxIiwic2NvcGVzIjpbXX0.JSviY6lWNUqO7o0sStrMyCdkNzFia5QL3hnVhPdFQl0bogTwDlKKcy-LHuhGMVu2vOAzQH8BAqfzBSsoPGK6gSEs3wtIgTHima_HsEXKfQ84jkGv07mmT8m7sWkIh63vxqZ2FEgBKo9AJigfVFEp9bx7TA1jAZnxwt6c_M6kP1jLRbS2FaHDjdsyW62qCQ88aiobPFln_zAD6uYg6uT37SD6bhPwJ_MgOQ5OhG-DtW0sxo8MCywQVsikMVmImPTqxQx910W6elgaM-fjP96qYBDecebK67_ziszoW0kVnBHP7hC4XN8UF_aVLO7O6X2jKC4yL1AM2daXhmjAco1URMiKigPs3-4GehfMx-0kbbhSzViXuVNs6dp6jReDH5lI__8U0SXttzaKydGGR3f82cHGPWhWLWniT56EQqRZquz1eLT79ev4oztNaLvwxCXGeSVVYwIzUTvNeUTeGr9IVUV7basxrg9vGinXcdSE5EpAYULPtLgrmgv1_d58IcWL25kmCReevj0QZZWdR-rrXPz0jo55a2hVEN8jSdeHYj5SM6owkNNCHgvWydqfiejP4Cue6-lUpnWB0Nw3mQCUDRTQV46FsFi-lOLGnCxnUByQqdd21wNviHbkb3HONvWR45eSeCWITb27fC3xvpK0NWhYBgL06uVxUM12jXFASvw')
        ->get('localhost:8080/api/nasabah-by-nik',[
            'nik'=>$nik
        ]);
        $this->cijdatas=$response->json();
    }

    public function render()
    {
        return view('livewire.auth.request-detail');
    }
}
