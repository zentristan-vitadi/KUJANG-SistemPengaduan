<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class response extends Model
{
    //
    protected $fillable = [
        'complaint_id',
        'admin_id',
        'response',
    ];
}
