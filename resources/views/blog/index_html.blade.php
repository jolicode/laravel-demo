<x-app-layout>
    <x-slot name="body_id">blog_index</x-slot>

    @forelse($posts as $post)
{{--        Using the old template inheritance here for diversity sake--}}
        @include('blog._post')
    @empty
        <div class="jumbotron">{{ 'post.no_posts_found' }}</div>
    @endforelse

    @if(method_exists($posts, 'links') && $posts->links()) {{-- Check if paginator is active --}}
        {{ $posts->links() }}
    @endif
</x-app-layout>
