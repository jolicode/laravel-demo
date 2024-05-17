<?xml version="1.0" encoding="UTF-8" ?>
<rss version="2.0">
    <channel>
        <title>{{ 'rss.title' }}</title>
        <description>{{ 'rss.description' }}</description>
        <pubDate>{{ now()->timezone('GMT')->format('r') }}</pubDate>
        <lastBuildDate>{{ ($posts?->last()?->published_at ?? now())->timezone('GMT')->format('r') }}</lastBuildDate>
        <link>{{ url('blog_index') }}</link>
        <language>{{ app()->getLocale() }}</language>

        @foreach($posts as $post)
            <item>
                <title>{{ $post->title }}</title>
                <description>{{ $post->summary }}</description>
                <link>{{ url('blog.post', ['slug' => $post->slug]) }}</link>
                <guid>{{ url('blog.post', ['slug' => $post->slug]) }}</guid>
                <pubDate>{{ $post->published_at->timezone('GMT')->format('r') }}</pubDate>
                <author>{{ $post->author->email }}</author>
                @foreach($post->tags as $tag)
                    <category>{{ $tag->name }}</category>
                @endforeach
            </item>
        @endforeach
    </channel>
</rss>
