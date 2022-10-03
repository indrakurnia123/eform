<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Request;
use App\Models\Gender;
use App\Models\Province;
use App\Models\City;
use App\Models\District;
use App\Models\Subdistrict;
use App\Models\NasabahStatus;
use App\Models\CijData;
use App\Models\User;

class Request extends Model
{
    use HasFactory;
    public $guarded=['id'];

    public function request_status()
    {
        return $this->belongsTo(RequestStatus::class);
    }

    public function gender()
    {
        return $this->belongsTo(Gender::class);
    }

    
    public function province()
    {
        return $this->belongsTo(Province::class);
    }
    
    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function district()
    {
        return $this->belongsTo(District::class);
    }

    public function subdistrict()
    {
        return $this->belongsTo(Subdistrict::class);
    }

    public function nasabah_status()
    {
        return $this->belongsTo(NasabahStatus::class);
    }

    public function cijdata()
    {
        return $this->belongsTo(CijData::class);
    }
    
    public function office()
    {
        return $this->belongsTo(Office::class);
    }
}
