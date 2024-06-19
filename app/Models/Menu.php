<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;
    protected $dates = ['deleted_at'];
    public $timestamps = false;
    protected $table = 'backend_menu_items';
}
