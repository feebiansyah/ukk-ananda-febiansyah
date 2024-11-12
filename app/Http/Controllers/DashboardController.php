<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class DashboardController extends Controller
{
    public function __construct(){
        if(!Auth::check())
        {
            return abort(404);
        }
        session(['menu' => 'dashboard']);
    }
    public function index()
    {
        return view('layout.dashboard');
    }
}
