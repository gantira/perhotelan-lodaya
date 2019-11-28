<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LaundryTemp extends Model
{
    protected $fillable = [
    	'jenis', 'jumlah', 'harga', 'subtotal'
    ];

    public function laundrysetting()
    {
        return $this->belongsTo('App\LaundrySetting', 'jenis');
    }
}
