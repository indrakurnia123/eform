<?php

namespace App\Repositories;
use Illuminate\Support\Facades\Http;
use App\Models\Request as Req;
use App\Models\CijData;

class DataCij
{
    public $url ='localhost:8080/api/nasabah-by-nik';
    public $username="indrakurnia768@gmail.com";
    public $password="indra123!";
    public $token="eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxIiwianRpIjoiZWVlNDQxZjExN2RiZDI1MTI2YjNjMjdkODIyOTdkNjk3N2Q2ZWUxZjRiOTJmYzNhNzVlZDgzZjc3MjQyNmEwNTA1YTkzNjFkOTlhNjA4Y2MiLCJpYXQiOjE2NjExMzI2NTcuNDQ1NzgxLCJuYmYiOjE2NjExMzI2NTcuNDQ1Nzg2LCJleHAiOjE2OTI2Njg2NTcuMzE3MjY5LCJzdWIiOiIxIiwic2NvcGVzIjpbXX0.AN5CmAWuz_ylpwgdHcjry4P2PzyvOiNAwq7MfHCs_AHL__5kOov9brQGg-LYaHlxQtZirpBmwXVpkOv8pJuqEwv13rXEujibVCRNQrkipZ47_4x87zOlDq1blNEVM7JKlcZPqcZF3LxmB3l610sx8BBV-T8hYRGyAbe-5wOp9b1uqt25Da6K_ANGLg0Joz8mNz1XxKNJCrvfBTCl9OIpjyvgrW3CjMbVXnsR0ELUEEJmg6iq5ngRZ0k1ViUaLetjRx5pbr2jZTSvm_7L9HxnDl1z-oywmRv0YP8_l5eSpWUHLpoAcaOHKSFbTGwoR7qSp6haKg4OiNb8YIG5bhINyYYPyj5g1IAooHcMKFZV9CmqB7P5AwqTXSrCiL3_Cf0YYhBxMwFSzTMZgC0ChNyxBj9NYEDY_-f4B_bw_X71Dsb3VUOnNSuqePHVUw7bVZbTQu4v7IDpma2LX15cIWWnG_hHau0CSnvbYE2l9i71gRiCkkfw7uo7R5MdfhHVGnyr6NoFHAYOnmhsSePITNHJg0Iqq-yJ7e6lxbQZx8k0IprREWHshZiRJgORXZAKPiADOhx7j5ZGY03zCdHk9wctxHJk6M8sjr5UYPogNAfuaOgOdd6IJORbsHh-rc96ldPyDCBTkDhSPgq5IHq4VBV3EH8n-xw0GyEXwxBP-_f0Mkk";

    public function data($nik,$no_permohonan)
    {
        $requset_number = CijData::where('request_number','=',$no_permohonan)->first();
        $response = Http::withToken($this->token)
        ->get($this->url,[
            'nik'=>$nik,
            'no_permohonan'=>$no_permohonan
        ]);
        
        if(!$requset_number)
        {
            $cijdata=CijData::create([
                'request_number'=>$no_permohonan,
                'response_code'=>$response['code'],
                'message'=>$response['message'],
                'response'=>json_encode($response['data'])
            ]);
            $cijdata_id=CijData::where('request_number','=',$no_permohonan)->select('id')->first();
            if($cijdata)
            {
                Req::where('request_number','=',$no_permohonan)
                ->update(['cijdata_id'=>$cijdata_id->id]);
            }
        }else{
            $cijdata=CijData::where('request_number','=',$no_permohonan)
            ->update([
                'request_number'=>$no_permohonan,
                'response_code'=>$response['code'],
                'message'=>$response['message'],
                // 'error'=>$response['error']['message'],
                'response'=>json_encode($response['data'])
            ]);
            $cijdata_id=CijData::where('request_number','=',$no_permohonan)->select('id')->first();
            if($cijdata)
            {
                Req::where('request_number','=',$no_permohonan)
                ->update(['cijdata_id'=>$cijdata_id->id]);
            }
        }
        return $response->json();
    }
}