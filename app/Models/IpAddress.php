<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IpAddress extends Model
{
    use HasFactory;

    protected $fillable = [
        'ip_v4',
        'ip_v6',
        'label',
        'comment',
        'created_by',
    ];
}