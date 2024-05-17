<x-app-layout>
    <x-slot name="body_id">blog_index</x-slot>

    @forelse($posts as $post)
{{--        Using the old template inheritance here for diversity sake--}}
        @include('blog._post')
    @empty
        <div class="jumbotron">{{ 'post.no_posts_found' }}</div>
    @endforelse

    {{ $posts->links() }}

    {{--@section('sidebar')--}}
    {{--    @parent--}}
    {{--    TODO: Blade extension--}}
    {{--    {{ show_source_code(_self) }}--}}
    {{--    @include('blog/_rss')--}}

    {{--@endsection--}}
</x-app-layout>
