<?php

namespace App\Http\Livewire\Auth;

use Livewire\Component;

class ViciDataDetail extends Component
{public $digidataResults;
    public $viciResults;

    public function mount()
    {
        $dummyVici = [
            'status'=>'OK',
            'ref_id'=>'970eafb8-ddd5-40d7-9cc1-a73650270c9b',
            'code'=>'SUCCESS',
            'timestamp'=>'2021-12-23T08:05:40+07:00',
            'message'=>null,
            'data'=>[
                'request_reff_id'=>'gi4455'
            ]
        ];
        $dummyDigidata=[
            'timestamp'=>1636352321,
            'status'=>200,
            'message'=>'SUCCESS',
            'info'=>[],
            'data'=>[
                'name'=>'89%',
                'birthdate'=>true,
                'birthplace'=>'75%',
                'address'=>'90%',
                'selfie_photo'=>'78%'
            ],
            'trx_id'=>'Abc123',
            'ref_id'=>'970eafb8-ddd5-40d7-9cc1-a73650270c9b'
        ];
        $this->digidataResults=$dummyDigidata;
    }
    public function render()
    {
        return view('livewire.auth.vici-data-detail');
    }
}
