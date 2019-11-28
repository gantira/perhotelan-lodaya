<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Room;
use App\Bed;
use App\Meeting;
use App\RoomDetail;
use App\Customer;
use App\Reservation;
use App\MeetingReservation;
use Carbon\Carbon;

class FrontController extends Controller
{
    public function reservasi(Request $request)
    {	
    	$checkin = Carbon::parse($request->checkin);
    	$checkout = Carbon::parse($request->checkout);

        if ($checkin < Carbon::today() || $checkout < Carbon::today() || $checkout == Carbon::today() || $checkout < $checkin) {
            return back()->withErrors(['Tanggal Tidak Valid']);
        }

    	$datediff = $checkin->diffInDays($checkout);

    	$collection = collect($request->all());
    	$collection->checkin = $checkin;
    	$collection->checkout = $checkout;
    	$collection->datediff = $datediff;

    	$data['temp'] = $collection;
        $data['room'] = Room::findOrFail($request->room);
        $data['bed'] = Bed::max('harga');

        $harga = 0;
        $room = Room::findOrFail($request->room);
        
        for ($i=0; $i < $datediff; $i++) { 
            $harga = $harga + (Carbon::parse($request->checkin)->addDays($i)->isWeekday() ? $room->weekday : $room->weekend);
        }

    	$data['total'] = $harga;

    	return view('front.reservasi', $data);
    }

    public function payment(Request $request)
    {
        $data = Customer::create($request->all());
        $collection = $request->all();
        $collection['customer_id'] = $data->id;
        $collection['status'] = 1;
        Reservation::create($collection);
        RoomDetail::where('id', $request->room_detail_id)->update(['status' => 1]);

        $data['customer'] = Customer::findOrFail($data->id);

    	return view('laporan.payment', $data);
    }

    public function meeting_reservasi(Request $request)
    {   
        $checkin = Carbon::parse($request->checkin);

        if ($checkin < Carbon::today()) {
            return back()->withErrors(['Tanggal Tidak Valid']);
        }

        $collection = collect($request->all());
        $collection->checkin = $checkin;

        $data['temp'] = $collection;
        $data['meeting'] = Meeting::findOrFail($request->meetingroom_id);
        return view('meeting.reservasi', $data);
    }

    public function meeting_payment(Request $request)
    {
        $data = Customer::create($request->all());
        $collection = $request->all();
        $collection['customer_id'] = $data->id;
        
        MeetingReservation::create($collection);
        Meeting::where('id', $request->meeting_id)->update(['status' => 1]);

        $data['customer'] = Customer::findOrFail($data->id);

        return view('laporan.meetingpayment', $data);
    }

}