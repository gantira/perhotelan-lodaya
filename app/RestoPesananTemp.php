<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RestoPesananTemp extends Model
{
    protected $fillable = [
        'resto_id', 'harga'
    ];

    public function resto()
    {
        return $this->belongsTo('App\Resto');
    }
}
