<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Room;
use App\RoomDetail;
use App\Reservation;
use Intervention\Image\ImageManagerStatic as Image;
use DB;

class RoomController extends Controller
{
    public function indexKelas()
	{
		return view('kelas.index');
	}

    public function indexRoom()
    {
        $data['room'] = Room::all();

        return view('room.index', $data);
    }

	public function store(Request $request)
    {
    	$destinationPath = 'upload/photo/';
        $fileName = time() . '_' . $request->file('photo')->getClientOriginalName();
        $request->file('photo')->move($destinationPath, $fileName);

    	$destinationThumbnails = 'upload/photo/thumbnails/';
        Image::make($destinationPath . $fileName)->resize(300, 200)->save($destinationThumbnails . $fileName);

        $data = $request->all();
        $data['photo'] = $destinationPath . $fileName;
        $data['thumbnail'] = $destinationThumbnails . $fileName;
        Room::create($data);

        $lastid = DB::getPdo()->lastInsertId();

        $no = (is_null((RoomDetail::where('room_id', $request->lastid)->max('id')))) ? RoomDetail::max('id')+1 : RoomDetail::where('room_id', $request->lastid)->max('id')+1;

        if ($no) {
            // Ada
            RoomDetail::where('room_id', $lastid)->delete();
            $ttl = $no+$request->qty;
            for ($i=$no; $i < $ttl ; $i++) { 
                RoomDetail::create(['room_id'=>$lastid, 'no'=>$i]);
            }
        }else {
            // Kosong
            for ($i=$no; $i < $request->qty ; $i++) { 
                RoomDetail::create(['room_id'=>$lastid, 'no'=>$i]);
            }
        }

    	return back();
    }


	public function update(Request $request)
	{
        $data = Room::updateOrCreate(['id' => $request->room_id], $request->all());

        return json_encode($data);
	}

	public function detail($id)
	{
        $data['room'] = Room::find($id);
        $data['reservation'] = Reservation::where('status', 1)->get();

		return view('room.detail', $data);
	}

    public function checkout(Request $request)
    {
        $data = Reservation::where('room_detail_id', $request->no)->where('status', 1)->first();

        RoomDetail::where('no', $request->no)->update(['status' => false]);
        Reservation::where('room_detail_id', $request->no)->where('status', 1)->update(['status' => false]);

        return json_encode($data);
    }

    public function destroy(Request $request)
    {
        $data = Room::findOrFail($request->room_id)->delete();

        return json_encode($data);

    }

    public function edit($id)
    {
        $data['kelas'] = Room::findOrFail($id);

        return view('kelas.edit', $data);
    }

    public function updateKelas(Request $request, $id)
    {
        $data = Room::findOrFail($id);
        $data->fill($request->all());
        $data->save();

        return back();
    }

    public function struk($id)
    {
        $data['reservation'] = Reservation::where('room_detail_id', $id)->orderBy('id', 'desc')->first();

        return view('room.struk', $data);
    }
}
