<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $fillable = [
        'nama', 'weekday', 'weekend', 'photo', 'thumbnail', 'fasilitas', 'deskripsi', 'qty', 'rating'
    ];

    public function detail()
    {
        return $this->hasMany('App\RoomDetail');
    }

    public function customer()
    {
        return $this->belongsTo('App\Customer');
    }

    public function laundry()
    {
        return $this->belongsTo('App\Laundry');
    }

    public function pesanan()
    {
        return $this->hasMany('App\RestoPesanan');
    }

}
