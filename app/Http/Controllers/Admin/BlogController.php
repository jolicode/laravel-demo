<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.blog.index', [
            'posts' => Post::bySelf()->paginate(5),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.blog.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        // Validate the slug
        $request->merge(['slug' => Str::slug($request->title)]);
        $request->validate(['slug' => 'unique:posts,slug']);

        $post = new Post($request->validated());
        $post->author()->associate($request->user());
        $post->save();

        // Handle the tags
        $tags = explode(',', $request->input('tags'));
        foreach ($tags as $tagName) {
            $tag = Tag::firstOrCreate(['name' => trim($tagName)]);
            $post->tags()->attach($tag->id);
        }

        session()->flash('success', 'Post was created!');

        return redirect()->route('admin.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
    }
}
