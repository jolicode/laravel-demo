<article class="post">
    <h2>
        <a href="{{ route('blog.post', ['post' => $post]) }}" class="text-gray-900 dark:text-white">
            {{ $post->title }}
        </a>
    </h2>

    <p class="post-metadata">
        <span class="metadata"><i class="fa fa-calendar"></i> {{ $post->published_at->format('F j, Y g:i A') }}</span>
        <span class="metadata"><i class="fa fa-user"></i> {{ $post->author->name }}</span>
    </p>

    <p class="text-gray-900 dark:text-gray-300">{{ $post->summary }}</p>

    @include('blog.post_tags')
</article>
