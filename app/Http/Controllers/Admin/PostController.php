<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::all();

        return view("posts.index", compact("posts"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();

        return view("posts.create", compact("categories", "tags"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $newPost = new Post();

        $newPost->title = $data['title'];
        $newPost->author = $data['author'];
        $newPost->category_id = $data['category_id'];
        $newPost->content = $data['content'];

        $newPost->save();

        if ($request->has('tags')) {
            $newPost->tags()->attach($data['tags']);
        }

        return redirect()->route("posts.index");
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view("posts.show", compact("post"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        $categories = Category::all();
        $tags = Tag::all();

        return view("posts.edit", compact('post', 'categories', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $data = $request->all();

        $post->title = $data['title'];
        $post->author = $data['author'];
        $post->category_id = $data['category_id'];
        $post->content = $data['content'];

        $post->update();

        if ($request->has('tags')) {
            $post->tags()->sync($data['tags']);
        } else {
            $post->tags()->detach();
        }

        return redirect()->route("posts.index");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route("posts.index");
    }
}
