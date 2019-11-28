<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
	protected $fillable = [
        'customer_id', 'room_detail_id', 'checkin', 'checkout', 'day', 'payment', 'extrabed', 'total', 'status'
    ];
    
    public function customer()
    {
        return $this->belongsTo('App\Customer');
    }

    public function roomDetail()
    {
        return $this->belongsTo('App\RoomDetail');
    }

    public function laundry()
    {
        return $this->hasOne('App\Laundry');
    }

    public function restoPesanan()
    {
        return $this->hasOne('App\RestoPesanan');
    }
}