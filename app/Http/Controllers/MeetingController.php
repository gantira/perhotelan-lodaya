<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Meeting;

class MeetingController extends Controller
{
    public function index()
    {
        $data['meeting'] = Meeting::all();

    	return view('meeting.index', $data);
    }

    public function store(Request $request)
    {
        
    	Meeting::create($request->all());

    	return redirect('/admin/meeting');
    }

    public function create()
    {
    	return view('meeting.create');
    }

    public function checkout(Request $request)
    {   
       $data = Meeting::where('id', $request->id)->update(['status' => false]);

        return json_encode($data);
    }
}
