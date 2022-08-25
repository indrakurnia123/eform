<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Request;

class CijData extends Model
{
    use HasFactory;

    protected $table='cijdatas';
    protected $guarded = [];
    public function request()
    {
        return $this->hasMany(Request::class);
    }
}
