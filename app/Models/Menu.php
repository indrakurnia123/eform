<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;
    protected $fillable=[
        'name',
        'path',
        'icon',
        'group_menu_id',
        'parent_id',
        'is_active',
    ];
}
