<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RoleHasMenu extends Model
{
    protected $primaryKey = 'id';
    protected $fillable = ['role_id','menu_id','is_add','is_edit','is_view','is_delete','is_enable'];
    protected $table = "role_has_menu";
    public $timestamps = false;
}
