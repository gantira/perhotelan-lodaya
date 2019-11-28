<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RestoPesanan extends Model
{
    protected $fillable = [
        'room_detail_id', 'reservation_id'
    ];

    public function room()
    {
        return $this->belongsTo('App\Room');
    }

    public function roomDetail()
    {
        return $this->belongsTo('App\RoomDetail');
    }

    public function restoPesananDetail()
    {
        return $this->hasMany('App\RestoPesananDetail');
    }
}
