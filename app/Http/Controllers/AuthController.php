<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    protected function authenticated($request, $user)
    {
        if ($user->role == ADMIN) {
            return redirect()->intended('admin.dashboard');
        }
        return redirect()->intended('home');
    }
}
