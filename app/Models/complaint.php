<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class complaint extends Model
{
    //
    protected $fillable = [
        'title',
        'description',
        'location',
        'photo',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function response()
    {
        return $this->hasMany(response::class, 'complaint_id');
    }
}
