<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Events\CommentCreatedEvent;
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
            $latestPosts = Post::latest('published_at')->published()->withTag($tag->id)->with(['tags', 'author'])->get();
        } else {
            $latestPosts = Post::latest('published_at')->published()->with(['tags', 'author'])->paginate(5);
        }

        // Every template name also has two extensions that specify the format and
        // engine for that template.
        return view('blog.index_' . $_format, [
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

        $comment = new Comment();
        $comment->author()->associate(auth()->user());
        $comment->post()->associate($post);
        $comment->content = $validated['content'];
        $comment->save();

        event(new CommentCreatedEvent($comment));

        // You can also use this code to create a new comment by using mass assignment
        // It is actually a good practice to use mass assignment to create a new model instance
        //        $currentUserId = auth()->id();
        //        $comment = new Comment([
        //            'content' => $validated['content'],
        //            'post_id' => $post->id,
        //            'author_id' => $currentUserId,
        //        ]);
        //        $comment->save();

        return redirect()->route('blog.post', ['post' => $post]);
    }
}
