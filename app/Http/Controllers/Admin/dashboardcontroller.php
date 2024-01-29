<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class dashboardcontroller extends Controller
{
    public function index(){
        if (Auth::check() && Auth::user()->role === ADMIN) {
            return view('admin.dashboard');
        }
    }
}
