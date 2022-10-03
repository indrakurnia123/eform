<?php

namespace App\Http\Livewire\Auth\Request\Detail;

use Livewire\Component;
use App\Repositories\Vici;
use App\Models\Request as Req;
use App\Models\ViciScore as ViciData;
use App\Models\ViciRequest;


class ViciScore extends Component
{
    public $viciscores;
    public $slik;
    public $vicirequest;
    public $score_category;

    public function mount($datas)
    {   
        if($datas->request_number)
        {
            $this->viciScore($datas->request_number);
            // dd($this->viciScore($datas->request_number));
        }else{
            $this->viciscores=null;
        }


        // if($request->request_reff_id!=null)
        // {
        //     $viciscores = ViciData::where('request_reff_id','=',$request->request_reff_id)->get();
        //     $this->viciscores=json_decode(json_decode(json_encode($viciscores[0]->data,true),true),true);
        //     $this->score_category = $vici->category($this->viciscores['data']['result_base_score'][0]);
        //     $this->slik=[
        //         'related_nik'=>0,
        //         'status'=>0,
        //         'longest_arrears'=>0,
        //         'active_loan'=>0,
        //         'highest_plafon'=>0,
        //         'most_arrears'=>0,
        //         'total_active_loan'=>0
        //     ];
        // }else{
        //     $this->viciscores=[
        //         'status'=>null,
        //         'data'=>[
        //             'result_base_score'=>[
        //                 0=>0
        //             ],
        //             'result_base_probability'=>0,
        //         ]
        //     ];
        //     $this->slik=[
        //         'related_nik'=>0,
        //         'status'=>0,
        //         'longest_arrears'=>0,
        //         'active_loan'=>0,
        //         'highest_plafon'=>0,
        //         'most_arrears'=>0,
        //         'total_active_loan'=>0
        //     ];
        //     $this->slik_descriptions=[
        //         0=>['no_description']
        //     ];
        // }
    }

    public function viciRequest($request_reff_id)
    {
        $request_reff_id = ViciRequest::where('request_reff_id','=',$request_reff_id)->get();
        if($request_reff_id)
        {
            return $request_reff_id[0]->request_reff_id;
        }else{
            return null;
        }
    }

    public function viciScore($request_number)
    {
        $vici = new Vici;
        $request=Req::where('request_number','=',$request_number)->select('request_reff_id')->get();
        $request_reff_id = $this->viciRequest($request[0]->request_reff_id);
        if($request_reff_id)
        {
            $score = $vici->score($request_reff_id);
            // (!array_key_exists('related_nik',$score['data']))?"":($score['data']['related_nik']);
            // (!array_key_exists('status',$score['data']))?"":($score['data']['status']);
            // (!array_key_exists('longest_arrears',$score['data']))?"":($score['data']['longest_arrears']);
            // (!array_key_exists('active_load',$score['data']))?"":($score['data']['active_load']);
            // (!array_key_exists('highest_plafon',$score['data']))?"":($score['data']['highest_plafon']);
            // (!array_key_exists('most_arrears',$score['data']))?"":($score['data']['most_arrears']);
            // (!array_key_exists('total_active_load',$score['data']))?"":($score['data']['total_active_load']);
            $this->viciscores=$score;
        }else{
            $this->viciscores=null;
        }
    }
    
    public function render()
    {
        return view('livewire.auth.request.detail.vici-score');
    }
}