<?php

namespace App\Http\Controllers;

use App\Models\post;
use Illuminate\Support\Facades\Auth;

class welcomeconrtoller extends Controller
{
    public function index()
    {

        $posts = post::all();

        return view('welcome', compact('posts'));
    }
}
