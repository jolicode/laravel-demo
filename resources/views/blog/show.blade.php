<x-app-layout>

    <h1 class="text-gray-900 dark:text-white">{{ $post->title }}</h1>

    <p class="post-metadata">
        <span class="metadata"><i class="fa fa-calendar"></i> {{ $post->published_at->format('F j, Y g:i A') }}</span>
        <span class="metadata"><i class="fa fa-user"></i> {{ $post->author->name }}</span>
    </p>

    <x-markdown :content="$post->content" />

    @include('blog.post_tags')

    <div id="post-add-comment" class="well">
        @can('create', App\Models\Comment::class)
            @include('blog._comment_form', ['post' => $post])
        @else
            <p>
                <a class="btn btn-success" href="{{ route('login', ['redirect_to' => Request::path()]) }}">
                    <i class="fa fa-sign-in" aria-hidden="true"></i> {{ 'action.sign_in' }}
                </a>
                {{ 'post.to_publish_a_comment' }}
            </p>
        @endcan
    </div>

    <h3 class="text-gray-900 dark:text-white">
        <i class="fa fa-comments" aria-hidden="true"></i> {{ 'post.num_comments' }}
    </h3>

    @forelse($post->comments as $comment)
        <div class="row post-comment">
            <h4 class="col-sm-3 text-gray-900 dark:text-gray-500">
                <strong class="text-gray-900 dark:text-white">{{ $comment->author->name }}</strong> {{ 'post.commented_on' }}
                <strong>{{ $comment->published_at->timezone('UTC')->format('F j, Y g:i A') }}</strong>
            </h4>
            <div class="col-sm-9">
                <x-markdown :content="$comment->content" />
            </div>
        </div>
    @empty
        <div class="post-comment">
            <p>{{ 'post.no_comments' }}</p>
        </div>
    @endforelse

    <x-slot name="sidebar">
        <x-sidebar :content="View::make('blog._rss')" />
    </x-slot>
</x-app-layout>
