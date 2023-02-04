<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bis extends Model
{
    // use HasFactory;
    protected $table = 'bis';
    protected $fillable = [
       'bis',
       'rombongan',
       'waktu_datang',
       'waktu_pulang',
       'asal'
    ];
}
