<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Resto extends Model
{
    protected $fillable = [
        'nama', 'jenis', 'harga', 'deskripsi', 'thumbnail'
    ];

    public function pesanan()
    {
        return $this->hasMany('App\RestoPesanan');
    }

}
