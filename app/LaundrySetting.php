<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LaundrySetting extends Model
{
    protected $fillable = [
    	'jenis', 'harga'
    ];
}
