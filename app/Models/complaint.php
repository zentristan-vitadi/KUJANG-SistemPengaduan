<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class complaint extends Model
{
    //
    protected $fillable = [
        'user_id',
        'title',
        'description',
        'location',
        'photo',
        'status',
    ];
}
