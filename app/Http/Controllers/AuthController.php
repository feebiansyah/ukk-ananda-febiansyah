<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }
    public function proses(Request $request)
    {
        $credential = $request->validate([
            'username' => 'required',
            'password' => 'required',
            'level' => 'required',
        ]);


        if(Auth::attempt($credential)){

            $request->session()->regenerate();
            return redirect()->route('dashboard');

        }else{

            return back()->with('pesan', 'username atau password salah');

        }

    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->regenerate();
        return redirect()->route('auth.login');
    }
}
