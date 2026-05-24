<?php

// app/Models/Response.php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Response extends Model  // Capital R
{
    protected $fillable = [
        'complaint_id',
        'admin_id',
        'response',
    ];

    public function complaint()
    {
        return $this->belongsTo(Complaint::class); // Capital C
    }

    public function admin()
    {
        return $this->belongsTo(User::class);
    }
}
