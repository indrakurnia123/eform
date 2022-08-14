<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $fillable = [
        'description',
        'created_at',
        'updated_at'
    ];

    public function user()
    {
        $this->belongsTo(User::class);
    }
    public function roleMenu()
    {
        $this->hasMany(RoleMenu::class);
    }
}
