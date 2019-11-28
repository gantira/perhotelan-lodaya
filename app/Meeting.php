<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Meeting extends Model
{
    protected $fillable = [
        'nama', 'type', 'deskripsi', 'harga'
    ];

    
}
