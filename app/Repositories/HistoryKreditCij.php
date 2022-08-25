<?php

namespace App\Repositories;
use Illuminate\Support\Facades\Http;
use App\Models\Request as Req;
use App\Models\CijData;

class HistoryKreditCij
{
    public function data($no_permohonan)
    {
        $data = CijData::where('request_number','=',$no_permohonan)->first();
        if($data)
        {   
            $results=[
                'code'=>$data['response_code'],
                'status'=>$data['message'],
                'data'=>json_decode($data['response'],true)
            ];
            if($results['code']==200)
            {
                Req::where('request_number','=',$no_permohonan)->update(['nasabah_status_id'=>2]);
            }else{
                Req::where('request_number','=',$no_permohonan)->update(['nasabah_status_id'=>3]);
            }
            return $results;
        }else{
            $results = [
                'code'=>401,
                'status'=>'Data tidak ditemukan',
                'message'=>'data belum tersedia silahkan lakukan pengecekan',
                'data'=>[]
            ];
            Req::where('request_number','=',$no_permohonan)->update(['nasabah_status_id'=>3]);
            return $results;
        }
    }
}