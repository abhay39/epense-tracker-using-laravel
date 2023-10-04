<?php

namespace App\Http\Controllers;

use App\Models\UserCheck;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function show($slug)
    {
        return view('post', [
            'post' => UserCheck::where('slug', '=', $slug)->first()
        ]);
    }

    public function store(Request $request)
   {
       $post = new UserCheck;

       $post->title = $request->title;
       $post->body = $request->body;
       $post->slug = $request->slug;

       $post->save();

       return response()->json(["result" => "ok"], 201);
   }
}
