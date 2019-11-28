<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use Session;

class LoginController extends Controller
{
    public function login(Request $request) {

        $credentials = $request->only('name', 'password');

        $credentials = [
            'name' => $request->input('name'),
            'password' => $request->input('password')
        ];

        if(Auth::attempt($credentials)){

            /*
            Jika username dan password match, lakukan logika if berikut ini.
            kalau user belum mengaktifkan accountnya, maka logout, dan tampilka message untuk mengaktifkannya
            */
            if (Auth::user()->name == 'admin') {
                return redirect('/admin/dashboard');
            }elseif (Auth::user()->name == 'petugas') {
                return redirect('/admin/dashboard');
            }elseif (Auth::user()->name == 'resto') {
                return redirect('/admin/resto');
            }elseif (Auth::user()->name == 'laundry') {
                return redirect('/admin/laundry');
            }
        }
        else {
                Session::flash('login', 'Wrong Username and Password');
                return back();
        }
    }

    public function logout() {
        Auth::logout();

        return redirect('/');
    }
}
