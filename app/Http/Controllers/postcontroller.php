<?php

namespace App\Http\Controllers;

use App\Models\post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use PHPUnit\Framework\Attributes\BackupGlobals;

class postcontroller extends Controller
{
    public function store(Request $request){
    //Validate Input Field are filled
        $validator = Validator::make($request->all(),[
            'title' => 'required',
            'description' => 'required',
            'image' => 'required|image'
        ]);

        if($validator->fails()){
            return back()->with('errorstatus', 'Something Went Wrong!');
        }else{

            $imagename = time() . "." . $request->image->extension();

            $request->image->move(public_path('image'), $imagename);

            post::create([
                'user_id' => Auth()->user()->id,
                'title' => $request->title,
                'description' => $request->description,
                'image' => $imagename

            ]);
        }
        return redirect(route('posts.allpost'))->with('status', 'Post Created Successfully.'); //go back to form after hit submit button
    }

    public function show($postId){

        $post = post::findOrfail($postId);

        return view('posts.show', compact('post'));
    }
/*
    public function latestpost($postId){
        $l = DB::table('posts');

        return view('posts.show', compact('l'));
    }
*/
    public function edit($postId){

        $post = post::findOrfail($postId);
        return view('posts.edit', compact('post'));
    }




    public function update($postId, Request $request){
        //Validate Input Field are filled
        $validator = Validator::make($request->all(),[
            'title' => 'required',
            'description' => 'required'

        ]);

        if($validator->fails()){
            return back()->with('errorstatus', 'Something Went Wrong!');
        }else{
            post::findOrFail($postId)->update($request->all());
        }
        return redirect(route('posts.allpost'))->with('status', 'Post Update Successful!');
    }





    public function delete($postId){
        post::findOrFail($postId)->delete();
        return redirect(route('posts.allpost'));

    }
}
