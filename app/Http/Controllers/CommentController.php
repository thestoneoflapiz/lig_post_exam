<?php

namespace App\Http\Controllers;

use Illuminate\Http\{
    Request, JsonResponse
};
use App\Models\{
    User, Post, Comment
};

class CommentController extends Controller
{
    function list(Request $request) : JsonResponse
    {
        $comments = Comment::where([
            "post_id" => $request->id
        ])->orderBy("created_at", "desc")->get();

        return response()->json([
            "data" => $comments
        ]);
    }

    function store(Request $request) : JsonResponse
    {
        $data = $request->validate([
            "body" => ["required"]
        ]);

        $new_comment = new Comment;
        $new_comment->post_id = $request->id;
        $new_comment->body = $data["body"];
        $new_comment->save();

        return response()->json([ $new_comment->id ]);
    }
}
