<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Laundry extends Model
{
	protected $table = 'laundrys';
	
    protected $fillable = [
    	'room_detail_id', 'reservation_id', 'tanggal_selesai', 'jam_selesai'

    ];

    public function laundryDetail()
    {
        return $this->hasMany('App\LaundryDetail');
    }

    public function room()
    {
        return $this->belongsTo('App\Room');
    }

    public function roomDetail()
    {
        return $this->belongsTo('App\RoomDetail');
    }

    public function reservation()
    {
        return $this->belongsTo('App\Reservation');
    }

}
