<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Laundry;
use App\LaundrySetting;
use App\LaundryTemp;
use App\LaundryDetail;
use App\RoomDetail;
use App\Reservation;
use Carbon\Carbon;

class LaundryController extends Controller
{
    public function index()
    {
        $data['jenis'] = LaundrySetting::pluck('jenis', 'id');
        $data['laundrytemp'] = LaundryTemp::all();
    	$data['room'] = RoomDetail::whereStatus('1')->pluck('id', 'no');

    	return view('laundry.index', $data);
    }

    public function setting()
    {
    	$data['setting'] = LaundrySetting::all();

    	return view('laundry.setting', $data);
    }


    public function settingStore(Request $request)
    {
    	LaundrySetting::create($request->all());

    	return back();
    }

    public function cekHarga(Request $request)
    {
    	$data = LaundrySetting::findOrFail($request->jenis_id);

    	return json_encode($data);
    }

    public function tambah(Request $request)
    {
        $data = LaundryTemp::create($request->all());

        return json_encode($data);
    }

    public function selesai(Request $request)
    {
        $laundrytemp = LaundryTemp::all();

        $data = Laundry::create($request->all());

        foreach ($laundrytemp as $key => $value) {

            LaundryDetail::insert(['laundry_id' => $data->id, 'room_detail_id' => $data->room_detail_id, 'jenis' => $value->jenis, 'jumlah' => $value->jumlah, 'harga' => $value->harga, 'subtotal' => $value->subtotal, 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()]);

        }

        LaundryTemp::truncate();

        $data['laundry'] = Laundry::findOrFail($data->id);
        $data['total'] = LaundryDetail::where('laundry_id', $data->id)->sum('harga');

        return view('laundry.struk', $data);
    }


    public function customer(Request $request)
    {
        $data = Reservation::where('room_detail_id', $request->room_id)->orderBy('id', 'desc')->first();

        return json_encode($data);
    }
}
