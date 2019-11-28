<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bed;

class BedController extends Controller
{
    public function index()
    {
    	$data['bed'] = Bed::max('harga');
    	return view('bed.index', $data);
    }

    public function update(Request $request)
    {
    	Bed::updateOrCreate(['id' => 1], $request->all());

    	return back();
    }
}