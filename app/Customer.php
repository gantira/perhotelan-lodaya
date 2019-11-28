<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = [
        'title', 'first_name', 'last_name', 'email', 'kode_area', 'tlp', 'address', 'country'
    ];

    public function reservation()
    {
    	return $this->hasOne('App\Reservation');
    }

    public function detail()
    {
    	return $this->hasOne('App\RoomDetail');
    }

    public function meetingReservation()
    {
        return $this->hasOne('App\MeetingReservation');
    }

}
