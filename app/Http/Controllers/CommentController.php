<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Comment;
use App\User;
use App\Post;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function index()
    {
        $comments = Comment::all();

        return view('admin.comment.index', compact('comments'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'body' => 'required',
        ]);

        $input = $request->all();
        $input['user_id'] = auth()->user()->id;

        Comment::create($input);

        return back();
    }

    public function update(Request $request)
    {
        $request->validate([
            'body' => 'required',
        ]);

        $input = $request->all();
    }

    public function destroy($id)
    {
        Comment::destroy($id);

        return back();
    }
}
