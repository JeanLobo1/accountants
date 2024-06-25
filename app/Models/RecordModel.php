<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecordModel extends Model
{
    use HasFactory;
    protected $dates = ['deleted_at'];
    public $timestamps = false;
    protected $table = 'records';

    protected $guarded = [];
}
