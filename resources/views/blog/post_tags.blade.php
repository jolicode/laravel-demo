@if($post->tags->isNotEmpty())
    <p class="post-tags">
        @foreach($post->tags as $tag)
            <a href="{{ route('blog.index', ['tag' => $tag->name == request()->query('tag') ? null : $tag->name]) }}"
               class="badge badge-{{ $tag->name == request()->query('tag') ? 'success' : 'secondary' }}"
            >
                <i class="fa fa-tag"></i> {{ $tag->name }}
            </a>
        @endforeach
    </p>

@endif
