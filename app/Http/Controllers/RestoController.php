<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Resto;
use App\RestoPesanan;
use App\RestoPesananDetail;
use App\RestoPesananTemp;
use App\RoomDetail;
use App\Reservation;
use Carbon\Carbon;
use Intervention\Image\ImageManagerStatic as Image;

class RestoController extends Controller
{
    public function index()
    {   
        $data['resto'] = Resto::all();

    	return view('resto.index', $data);
    }

    public function create()
    {
        return view('resto.create');
    }

    public function store(Request $request)
    {
    	$destinationPath = 'upload/photo/';
        $fileName = time() . '_' . $request->file('thumbnail')->getClientOriginalName();
        $request->file('thumbnail')->move($destinationPath, $fileName);

    	$destinationThumbnails = 'upload/photo/thumbnails/';
        Image::make($destinationPath . $fileName)->resize(300, 200)->save($destinationThumbnails . $fileName);

        $data = $request->all();
        $data['thumbnail'] = $destinationThumbnails . $fileName;

    	Resto::create($data);

    	return redirect('admin/resto');
    }

    public function destroy(Request $request)
    {
        $data = Resto::findOrFail($request->resto_id)->delete();

        return json_encode($data);
    }

    public function edit($id)
    {
        $data['resto'] = Resto::findOrFail($id);

        return view('resto.edit', $data);
    }

    public function update(Request $request, $id)
    {
        $data = Resto::findOrFail($id);
        $data->fill($request->all());
        $data->save();

        return back();
    }

    public function pesan()
    {
        $data['resto'] = Resto::all();
        $data['restoTemp'] = RestoPesananTemp::all();
        $data['room'] = RoomDetail::whereStatus('1')->pluck('id', 'no');

        return view('resto.pesan', $data);
    }

    public function addTemp(Request $request)
    {
        $data = RestoPesananTemp::create($request->all());

        return json_encode($data);
    }

    public function delete($id)
    {
        RestoPesananTemp::findOrFail($id)->delete();

        return back();
    }

    public function submit(Request $request)
    {
        $restoTemp = RestoPesananTemp::all();

        $data = RestoPesanan::create($request->all());

        foreach ($restoTemp as $key => $value) {
            RestoPesananDetail::insert(['resto_pesanan_id' => $data->id, 'room_detail_id' => $request->room_detail_id, 'resto_id' => $value->resto_id, 'harga' => $value->harga, 'created_at'=> Carbon::now(), 'updated_at' => Carbon::now()]);  
        }

        RestoPesananTemp::truncate();
        $data['restopesanan'] = RestoPesanan::findOrFail($data->id);
        $data['total'] = RestoPesananDetail::where('resto_pesanan_id', $data->id)->sum('harga');
        $total = 0;

        return view('resto.struk', $data);
    }

    public function customer(Request $request)
    {
        $data = Reservation::where('room_detail_id', $request->room_id)->orderBy('id', 'desc')->first();

        return json_encode($data);
    }
}
