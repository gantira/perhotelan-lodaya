<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LaundryDetail extends Model
{
    protected $fillable = [
    	'room_detail_id', 'jenis', 'jumlah', 'harga', 'subtotal'
    ];

    public function laundrysetting()
    {
        return $this->belongsTo('App\LaundrySetting', 'jenis');
    }

    public function laundry()
    {
        return $this->belongsTo('App\Laundry');
    }

    public function room()
    {
        return $this->belongsTo('App\Room');
    }

    public function roomDetail()
    {
        return $this->belongsTo('App\RoomDetail');
    }

}