<?php

namespace App\Http\Controllers;

use Illuminate\Http\{
    Request, JsonResponse
};
use Illuminate\Support\Facades\{
    Auth
};
use App\Models\{
    User, Post, Comment
};

class PostController extends Controller
{
    function list(Request $request) : JsonResponse
    {
        $more = ($request->page * 10);
        $posts = Post::take($more)->orderBy("created_at", "desc")->get();
       
        return response()->json([
            "data" => $posts
        ]);
    }

    function store(Request $request) : JsonResponse
    {
        $data = $request->validate([
            "title" => ["required", "max:250"],
            "content" => ["required", "max:2500"]
        ]);

        if($data){

            $new_post = new Post;
            $new_post->image = $request->image ?? null;
            $new_post->title = $data["title"];
            $new_post->content = $data["content"];
            $new_post->user_id = Auth::id();
            $new_post->save();

            return response()->json([
                "data" => $new_post
            ]);
        }

        return response()->json([], 400);
    }
}
