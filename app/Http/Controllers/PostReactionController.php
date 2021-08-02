<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PostReaction;
use App\Models\Post;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Input;
use Auth;
use Storage;
use File;

class PostReactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
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
        if (Post::find($request->post_id)->hasCurrentUserReacted($request->reaction_id)) 
        {
            PostReaction::where('post_id', $request->post_id)
                ->where('user_id', Auth::user()->id)
                ->where('reaction_id', $request->reaction_id)
                ->delete();
        } 
        else 
        {
            $postReaction = new PostReaction();
            $postReaction->post_id = $request->post_id;
            $postReaction->user_id = Auth::user()->id; 
            $postReaction->reaction_id = $request->reaction_id;

            $postReaction->save();
        }
        return redirect()->route('posts.index');
    }

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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
