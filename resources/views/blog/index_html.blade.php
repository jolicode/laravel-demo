@extends('layouts.app')

@section('body_id', 'blog_index')

@section('main')
    @forelse($posts as $post)
        @include('blog._post')
    @empty
        <div class="jumbotron">{{ 'post.no_posts_found' }}</div>
    @endforelse

    {{ $posts->links() }}
@endsection

@section('sidebar')
    @parent
{{--    TODO: Blade extension--}}
{{--    {{ show_source_code(_self) }}--}}
    @include('blog/_rss')

@endsection
