<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Office extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'address',
        'created_at',
        'updated_at'
    ];

    public function user()
    {
        $this->belongsTo(User::class);
    }
}
