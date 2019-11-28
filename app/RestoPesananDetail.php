<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RestoPesananDetail extends Model
{
    protected $fillable = [
        'resto_pesanan_id', 'room_detail_id', 'resto_id', 'harga'

    ];

    public function resto()
    {
        return $this->belongsTo('App\Resto');
    }
}
