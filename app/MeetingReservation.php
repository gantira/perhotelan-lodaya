<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MeetingReservation extends Model
{
    protected $fillable = [
        'customer_id', 'meeting_id', 'checkin', 'payment', 'total', 'jam'
    ];

    public function customer()
    {
        return $this->belongsTo('App\Customer');
    }

    public function meeting()
    {
        return $this->belongsTo('App\Meeting');
    }
}
