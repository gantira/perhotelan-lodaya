<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Reservation;
use App\Customer;
use App\Room;
use App\Laundry;
use App\LaundrySetting;
use App\Resto;
use App\RestoPesanan;
use App\RoomDetail;
use App\News;
use App\Meeting;
use App\MeetingReservation;
use Terbilang;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {	
    	$data['total_reservation'] = Reservation::all()->count();
    	$data['total_customer'] = Customer::all()->count();
    	$data['total_news'] = Terbilang::make(News::all()->count());
        $data['total_room'] = Room::all()->count();
        $data['total_resto'] = Resto::all()->count();
    	$data['total_laundry'] = LaundrySetting::all()->count();

        $data['reservation'] = Reservation::all();
        $data['reservation_meetingroom'] = MeetingReservation::all();
        $data['resto_pesanan'] = RestoPesanan::all();
        $data['resto'] = Resto::all();
    	$data['laundry'] = Laundry::all();
    	
    	return view('dashboard.index', $data);
    }
}
