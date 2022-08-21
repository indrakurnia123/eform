<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Request;
use App\Models\Gender;

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
}
