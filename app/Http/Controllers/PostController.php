<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use App\Models\Post;
use App\Models\Comment;
use App\Models\Tag;
use App\Models\User;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::all();
        $comments = Comment::all();
        return view('posts.index', ['posts' => $posts, 'comments' => $comments]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        $posts = Post::all();
        return view('posts.show', ['user' => $user, 'posts' => $posts]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, Post $post)
    {
        # Only allow admins and owners of posts to update posts
        if ($request->user()->cannot('edit', $post)) {
            abort(403);
        }

        $tags = Tag::all();
        return view('posts.edit', ['post' => $post, 'tags' => $tags]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        # Only allow admins and owners of posts to update posts
        if ($request->user()->cannot('update', $post)) {
            abort(403);
        }

        $file = $request->hasFile('image');
        if ($file) {
            $new_file = $request->file('image');
            $file_path = $new_file->store('images');
            $post->image_name = $file_path;
        }

        if ($request['caption'] != null) {
            $post->caption = $request['caption'];
        }

        $post->save();

        if ($request['tag_id'] != null) {
            # In case the same tag is added to a post more than once
            try{
                $post->tags()->attach($request['tag_id']);
            } catch(QueryException $e) {
                return redirect()->route('posts.index');
            }
            
        }

        session()->flash('message', 'post was updated!');
        return redirect()->route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Post $post)
    {
        # Only allow admins and owners of posts to delete posts
        if ($request->user()->cannot('delete', $post)) {
            abort(403);
        }
        
            $post->delete();
        
            # Flash message
            return redirect()->route('home')->with('message', 'Post was deleted.');
    }
}