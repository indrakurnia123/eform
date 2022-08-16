<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Request;

class RequestStatus extends Model
{
    use HasFactory;
    protected $guarded=['id'];

    public function request()
    {
        return $this->hasMany(Request::class);
    }
}
