<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Reactions;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\User;
use App\Models\UserConnections;
use App\Models\PostReaction;
use App\Models\PostComment;
use Auth;
use Storage;
use File;

class PostController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userConnections1st = Auth::user()->userConnections1st();
        $userConnections1stReactedPosts = PostReaction::whereIn('user_id', $userConnections1st)->pluck('post_id');
        $posts = Post::where('user_id', Auth::user()->id)
            ->orwhereIn('user_id', $userConnections1st)
            ->orWhereIn('id', $userConnections1stReactedPosts)
            ->get();

        return view('posts')
            ->with('posts', $posts)
            ->with('reactions', Reactions::all())
            ->with('postcomments', PostComment::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post = new Post();
        $post->body = $request['body'];
        $message = 'Error';
        if ($request->user()->posts()->save($post)) {
            $message = 'Post succesfully created!';
        }
        return redirect()->route('posts.index')->with(['message' => $message]);
    }

    // public function loadReaction(Request $request)
    // {
    //     $reactions = Reaction::orderBy('id', 'asc')->get();
    // }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    { }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post = Post::find($id);
        $post->body = $request->body;
        $post->save();
        return redirect()->route('posts.index');
    }

    /**
     *
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy(Post $post)
    {
        if (auth()->id() != $post->user_id) {
            return redirect()->back();
        }

        $post->delete();

        return redirect()->route('posts.index')->with(['message' => 'Succesfully deleted']);
    }
}
