<?php

namespace App\Repositories;
use Illuminate\Support\Facades\Http;
use App\Models\ViciCredential;
use App\Models\SlikCredential;
use App\Models\ViciSetUserLog;
use App\Models\ViciRequest;
use App\Models\ViciScore;
use App\Models\Request as Req;

class Vici
{
    public $vici_credential;
    public $slik_credential;
    public $request;

    public function __construct()
    {
        // $this->request = Req::where('request_number','=',$request_number)->get()[0];

        $this->vici_credential = ViciCredential::all()[0];

        $this->slik_credential = SlikCredential::all()[0];
    }

    public function category(Int $score)
    {
        switch($score)
        {
            case($score<500):
                $category="Very Poor";
                break;
            case($score>=500 && $score<527):
                $category="Poor";
                break;
            case($score>=527 && $score<559):
                $category="Fair";
                break;
            case($score>=559 && $score<579):
                $category="Good";
                break;
            case($score>=579 && $score<650):
                $category="Very Good";
                break;
            case($score>=650):
                $category="Exceptional";
                break;
            default:
                $category="Unknown";
        }
        return $category;
    }

    public function risk($score)
    {
        switch($score)
        {
            case($score<500):
                $risk="Very High";
                break;
            case($score>=500 && $score<527):
                $risk="High";
                break;
            case($score>=527 && $score<559):
                $risk="Medium High";
                break;
            case($score>=559 && $score<579):
                $risk="Medium";
                break;
            case($score>=579 && $score<650):
                $risk="Low";
                break;
            case($score>=650):
                $risk="Very Low";
                break;
            default:
                $risk="Unknown";
        }
        return $risk;

    }

    public function set_user(String $trx_id)
    {
        // $request_number = CijData::where('request_number','=',$no_permohonan)->first();
        $response = Http::withHeaders(['apikey' => $this->vici_credential->apikey])
        ->accept('application/json')
        ->withOptions(["verify"=>false])
        ->post($this->vici_credential->base_url.'set-user', [
            'trx_id'=>$trx_id,
            'email' => $this->vici_credential->email,
            'userid_slik' => $this->slik_credential->userid_slik,
            'password_slik' => $this->slik_credential->password_slik,
            'password_viewer' => $this->slik_credential->password_viewer
        ]);
        
        $data = json_decode($response,true);

        // dd($data);

        $set_log=ViciSetUserLog::create([
            'response'=>json_encode(json_decode(json_encode($response->body(),true),true),true),
            'status'=>$data['status'],
            'ref_id'=>$data['ref_id'],
            'code'=>$data['code'],
            'response_time'=>$data['timestamp'],
            'message'=>($data['message']==null)?"":$data['message'],
            'trx_id'=>$data['trx_id'],
            'data'=>($data['data']==null)?"":json_encode($data['data'],true),
        ]);
        $set_log->save();

        return $data;
    }
    // public function request(String $trx_id=null,String $ktp,String $name,String $npwp=null,String $pob,String $dob,String $gender,String $mmn=null, String $address=null,Int $custtype)
    public function request(String $request_number)
    {

        $request_exists=ViciRequest::where('trx_id','=',$request_number)->where('is_active','=',1)->get();
        dd($request_exists[0]);
        if($request_exists)
        {
            if($request_exists[0]->code=="SUCCESS")
            {
                $data = json_decode($request_exists[0]->response,true);
            }else{
                $request=Req::where('request_number','=',$request_number)->get();
                $response = Http::withHeaders(['apikey' => $this->vici_credential->apikey])
                ->accept('application/json')
                ->withOptions(["verify"=>false])
                ->post($this->vici_credential->base_url.'request', [
                    'debitur'=>[
                        'trx_id'=>$request[0]->request_number,
                        'ktp'=>$request[0]->nik,
                        'name'=>$request[0]->name,
                        'npwp'=>($request[0]->npwp==null)?"":$request[0]->npwp,
                        'pob'=>$request[0]->birth_place,
                        'dob'=>$request[0]->birth_date,
                        'gender'=>($request[0]->gender_id==1)?"M":"F",
                        'mmn'=>($request[0]->gender==null)?"":$request[0]->mother_name,
                        'address'=>($request[0]->address==null)?"":$request[0]->address,
                        'custtype'=>$request[0]->custtype
                    ]
                ]);
                $data = json_decode($response,true);

                ViciRequest::where('trx_id','=',$request)
                ->update([
                    'response'=>json_encode(json_decode($response,true),true),
                    'status'=>$data['status'],
                    'ref_id'=>$data['ref_id'],
                    'code'=>$data['code'],
                    'response_time'=>$data['response_time'],
                    'message'=>($data['message']==null)?"":$data['message'],
                    'trx_id'=>($data['trx_id']==null)?"":$data['trx_id'],
                    'data'=>($data['data']==null)?"":$data['data'],
                ]);
            }
        }else{
            $request=Req::where('request_number','=',$request_number)->get();
            $response = Http::withHeaders(['apikey' => $this->vici_credential->apikey])
            ->accept('application/json')
            ->withOptions(["verify"=>false])
            ->post($this->vici_credential->base_url.'request', [
                'debitur'=>[
                    'trx_id'=>$request[0]->request_number,
                    'ktp'=>$request[0]->nik,
                    'name'=>$request[0]->name,
                    'npwp'=>($request[0]->npwp==null)?"":$request[0]->npwp,
                    'pob'=>$request[0]->birth_place,
                    'dob'=>$request[0]->birth_date,
                    'gender'=>($request[0]->gender_id==1)?"M":"F",
                    'mmn'=>($request[0]->gender==null)?"":$request[0]->mother_name,
                    'address'=>($request[0]->address==null)?"":$request[0]->address,
                    'custtype'=>$request[0]->custtype
                ]
            ]);
            $data = json_decode($response,true);
            
            $vici_request=ViciRequest::create([
                'response'=>json_encode(json_decode($response,true),true),
                'status'=>$data['status'],
                'ref_id'=>$data['ref_id'],
                'code'=>$data['code'],
                'response_time'=>$data['response_time'],
                'message'=>($data['message'])==null?"":$data['message'],
                'trx_id'=>($data['trx_id'])==null?"":$data['trx_id'],
                'data'=>($data['data'])==null?"":$data['data'],
            ]);
            $vici_request->save();

        }        
        return $data;
    }

    public function score($request_reff_id,$age_bussiness=null)
    {
        $score_exists = ViciScore::where('request_reff_id','=',$request_reff_id)->get();
        if($score_exists)
        {
            if($score_exists[0]->code == "SUCCESS")
            {
                $data = json_decode($score_exists[0]->response,true);
            }else{
                $response = Http::withHeaders(['apikey' => $this->vici_credential->apikey])
                ->accept('application/json')
                ->withOptions(["verify"=>false])
                ->asForm()
                ->post($this->vici_credential->base_url.'score', [
                    'request_reff_id'=>$request_reff_id
                ]);

                $data = json_decode($response,true);

                ViciScore::where('request_reff_id','=',$request_reff_id)->update([
                    'response'=>json_encode($data,true),
                    'status'=>$data['status'],
                    'ref_id'=>$data['ref_id'],
                    'code'=>$data['code'],
                    'response_time'=>$data['timestamp'],
                    'data'=>json_encode($data['data'],true)
                ]);
            }
        }else{

            $response = Http::withHeaders(['apikey' => $this->vici_credential->apikey])
            ->accept('application/json')
            ->withOptions(["verify"=>false])
            ->asForm()
            ->post($this->vici_credential->base_url.'score', [
                'request_reff_id'=>$request_reff_id
            ]);

            $data = json_decode($response,true);

            $viciscore=ViciScore::create([
                'request_reff_id'=>$request_reff_id,
                'response'=>json_encode($data,true),
                'status'=>$data['status'],
                'ref_id'=>$data['ref_id'],
                'code'=>$data['code'],
                'response_time'=>$data['timestamp'],
                'data'=>json_encode($data['data'],true)
            ]);
            $viciscore->save();            
        }
        return $data;
    }
}