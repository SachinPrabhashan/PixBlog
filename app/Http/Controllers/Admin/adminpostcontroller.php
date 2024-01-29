<?php

namespace App\Http\Controllers\Admin;

use App\Models\post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\User;

class adminpostcontroller extends Controller
{
    public function alluserpost(){

        $posts = post::all();

        return view('admin.adminallpost', compact('posts'));
    }

    public function usermanage(){

        $users = User::all();

        return view('admin.usermanagement', compact('users'));
    }

    public function deleteuser($userId){
        user::findOrFail($userId)->delete();
        return redirect(route('admin.usermanagement'));
    }

}
