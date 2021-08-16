<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function __construct()
    {
        return $this->middleware(['auth']);
    }

    public function index()
    {
        return view('posts.index')->with('posts', Post::paginate(2));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'body' => 'required'
        ]);

        $request->user()->posts()->create($request->only('body'));

        return back();
    }
}
