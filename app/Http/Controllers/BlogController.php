<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\StoreCommentRequest;
use App\Models\Comment;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(Request $request, int $page, string $_format): \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\View\View
    {
        $tag = null;

        if ($request->query->has('tag')) {
            $tag = Tag::where('name', $request->query->get('tag'))->first();
        }

        // TODO: Pagination
        //        $latestPosts = Post::latest($page, $tag);
        $latestPosts = Post::all();

        // Every template name also has two extensions that specify the format and
        // engine for that template.
        return view('blog.index_' . $_format, [
            //            'paginator' => $latestPosts,
            'posts' => $latestPosts,
            'tagName' => $tag?->name,
        ]);
    }

    public function show(Post $post)
    {
        return view('blog.show', ['post' => $post]);
    }

    public function search(Request $request): \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\View\View
    {
        return view('blog.search', ['query' => (string) $request->query->get('q', '')]);
    }

    public function newComment(StoreCommentRequest $request, Post $post)
    {
        $validated = $request->validated();

        $currentUserId = auth()->id();

        $comment = new Comment();
        //        $comment->author()->associate(auth()->user());
        $comment->author_id = $currentUserId ?? 1; // TODO: Remove when authentication is implemented
        $comment->post()->associate($post);
        $comment->content = $validated['content'];
        $comment->save();

        //        You can also use this code to create a new comment by using mass assignment
        //        $comment = new Comment([
        //            'content' => $validated['content'],
        //            'post_id' => $post->id,
        //        ]);
        //        $comment->save();

        return redirect()->route('blog.post', ['post' => $post]);
    }
}
