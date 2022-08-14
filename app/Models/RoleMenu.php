<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoleMenu extends Model
{
    use HasFactory;
    protected $fillable = [
        'role_id',
        'menu_id'
    ];

    public function role()
    {
        $this->hasMany(Role::class);
    }

    public function menu()
    {
        $this->hasMany(Menu::class);
    }
}
