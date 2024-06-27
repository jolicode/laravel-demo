<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use App\Models\Post;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.blog.index', [
            'posts' => Post::latest('published_at')->bySelf()->paginate(5),
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
        // Add & Validate the slug
        $request->merge(['slug' => Str::slug($request->title)]);
        $request->validate(['slug' => 'unique:posts,slug']);

        $post = new Post($request->validated());
        $post->author()->associate($request->user());
        $post->save();

        // Handle the tags
        $tags = explode(',', $request->tags ?? '');
        $post->attachTagsToPost($tags);

        session()->flash('success', 'Post was created!');

        return redirect()->route('admin.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        Gate::authorize('viewAdmin', $post);

        return view('admin.blog.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        Gate::authorize('update', $post);

        return view('admin.blog.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StorePostRequest $request, Post $post)
    {
        Gate::authorize('update', $post);

        $post->update($request->validated());

        // Handle the tags
        $tags = explode(',', $request->tags ?? '');
        $post->attachTagsToPost($tags);

        session()->flash('success', 'Post was updated!');

        return redirect()->route('admin.post_edit', $post);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        Gate::authorize('delete', $post);

        $post->delete();

        session()->flash('success', 'Post was deleted!');

        return redirect()->route('admin.index');
    }
}
