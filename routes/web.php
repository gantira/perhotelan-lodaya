<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('front.home');
});

Route::get('/room', function () {
	$data['room'] = App\Room::all();
	$data['meeting'] = App\Meeting::all();
    return view('front.room', $data);
});

Route::get('/resto', function () {
	$data['resto'] = App\Resto::all();
    return view('front.resto', $data);
});

Route::get('/meetingroom', function () {
	$data['meetingroom'] = App\Meeting::all();
    return view('front.meetingroom', $data);
});

Route::post('/reservasi', 'FrontController@reservasi');
Route::post('/reservasi/meeting', 'FrontController@meeting_reservasi');
Route::post('/reservasi/payment', 'FrontController@payment');
Route::post('/reservasi/meeting/payment', 'FrontController@meeting_payment');

Route::post('/login', 'LoginController@login');
Route::get('/logout', 'LoginController@logout');

Route::get('/admin/kelas', 'RoomController@indexKelas');
Route::post('/admin/kelas', 'RoomController@store');
Route::patch('/admin/kelas/{id}/update', 'RoomController@updateKelas');

Route::get('/admin/room', 'RoomController@indexRoom');
Route::get('/admin/room/{id}/detail', 'RoomController@detail');
Route::get('/admin/room/{id}/edit', 'RoomController@edit');
Route::post('/admin/room/update', 'RoomController@update');
Route::post('/admin/room/checkout', 'RoomController@checkout');
Route::post('/admin/room/destroy', 'RoomController@destroy');
Route::get('/admin/room/struk/{id}', 'RoomController@struk');

Route::get('/admin/news', 'NewsController@index');
Route::post('/admin/news', 'NewsController@store');

Route::get('/admin/resto', 'RestoController@index');
Route::get('/admin/resto/pesan', 'RestoController@pesan');
Route::get('/admin/resto/pesan/{id}/delete', 'RestoController@delete');
Route::get('/admin/resto/create', 'RestoController@create');
Route::get('/admin/resto/{id}/edit', 'RestoController@edit');
Route::post('/admin/resto', 'RestoController@store');
Route::post('/admin/resto/destroy', 'RestoController@destroy');
Route::post('/admin/resto/pesan/addTemp', 'RestoController@addTemp');
Route::post('/admin/resto/pesan/submit', 'RestoController@submit');
Route::patch('/admin/resto/{id}/update', 'RestoController@update');
Route::post('/admin/resto/customer', 'RestoController@customer');

Route::get('/admin/laundry', 'LaundryController@index');
Route::get('/admin/laundry/setting', 'LaundryController@setting');
Route::post('/admin/laundry', 'LaundryController@settingStore');
Route::post('/admin/laundry/harga', 'LaundryController@cekHarga');
Route::post('/admin/laundry/tambah', 'LaundryController@tambah');
Route::post('/admin/laundry/selesai', 'LaundryController@selesai');
Route::post('/admin/laundry/customer', 'LaundryController@customer');

Route::get('/admin/dashboard', 'DashboardController@index');

Route::get('/admin/meeting', 'MeetingController@index');
Route::get('/admin/meeting/create', 'MeetingController@create');
Route::post('/admin/meeting/store', 'MeetingController@store');
Route::post('/meeting/reservasi/chekcout', 'MeetingController@checkout');

Route::post('/admin/laporan/hotel', 'LaporanController@hotel');
Route::post('/admin/laporan/meeting', 'LaporanController@meeting');
Route::post('/admin/laporan/resto', 'LaporanController@resto');
Route::post('/admin/laporan/laundry', 'LaporanController@laundry');

Route::get('/admin/bed', 'BedController@index');
Route::patch('/admin/bed', 'BedController@update');
