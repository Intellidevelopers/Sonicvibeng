<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\ReplyComment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CommentController extends Controller
{
    public function addComment(Request $request)
    {
        $validate = Validator::make($request->all(),[
            'name'=> 'required',
            'email' => 'required',
            'comment'=> 'required',
        ]);
        if($validate->fails()){
            return back()->with('error','please fill up the empty space');
        }
        $post = new Comment();
        $post->blog_id = $request->id;
        $post->name = $request->name;
        $post->email = $request->email;
        $post->message = $request->comment;
        $post->save();
        return back()->with('msg','success');
    }
    public function addreplyComment(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'name' => 'required',
            'comment' => 'required',
        ]);
        if ($validate->fails()) {
            return back()->with('error', 'please fill up the empty space');
        }
        $post = new ReplyComment();
        $post->blog_id = $request->id;
        $post->comment_id = $request->commentid;
        $post->name = $request->name;
        $post->message = $request->comment;
        $post->save();
        return back()->with('msg', 'success');
    }
}