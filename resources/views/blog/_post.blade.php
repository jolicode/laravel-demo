<article class="post">
    <h2>
        <a href="{{ route('blog.post', ['post' => $post]) }}">
            {{ $post->title }}
        </a>
    </h2>

    <p class="post-metadata">
        <span class="metadata"><i class="fa fa-calendar"></i> {{ $post->published_at->format('F j, Y g:i A') }}</span>
        <span class="metadata"><i class="fa fa-user"></i> {{ $post->author->name }}</span>
    </p>

    <p>{{ $post->summary }}</p>

    @include('blog.post_tags')
</article>
