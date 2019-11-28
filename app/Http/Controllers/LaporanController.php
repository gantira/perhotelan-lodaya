<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Reservation;
use App\MeetingReservation;
use App\RestoPesanan;
use App\RestoPesananDetail;
use App\Laundry;
use App\LaundryDetail;
use Carbon\Carbon;

class LaporanController extends Controller
{
    public function hotel(Request $request)
    {
    	$data['reservation'] = Reservation::whereBetween('created_at', array($request->awal, $request->akhir))->get();
        $data['awal'] = $request->awal;
        $data['akhir'] = $request->akhir;

    	return view('laporan.hotel', $data);
    }

    public function meeting(Request $request)
    {
    	$data['meeting'] = MeetingReservation::whereBetween('created_at', array($request->awal, $request->akhir))->get();
        $data['awal'] = $request->awal;
        $data['akhir'] = $request->akhir;

    	return view('laporan.meeting', $data);
    }

    public function resto(Request $request)
    {
        $data['resto_pesanan'] = RestoPesanan::whereBetween('created_at', array($request->awal, $request->akhir))->get();
    	$data['total'] = RestoPesananDetail::sum('harga');
        $data['awal'] = $request->awal;
        $data['akhir'] = $request->akhir;

    	return view('laporan.resto', $data);
    }

    public function laundry(Request $request)
    {
    	$data['laundry'] = Laundry::whereBetween('created_at', array($request->awal, $request->akhir))->get();
        $data['total'] = LaundryDetail::sum('subtotal');
        $data['awal'] = $request->awal;
        $data['akhir'] = $request->akhir;
        
    	return view('laporan.laundry', $data);
    }
}
