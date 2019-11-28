<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RoomDetail extends Model
{
    protected $fillable = [
        'room_id', 'no', 'status'
    ];

    public function room()
    {
    	return $this->belongsTo('App\Room');
    }

    public function reservation()
    {
    	return $this->hasOne('App\Reservation');
    }

}