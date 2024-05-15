@extends('layouts.app')

@section('title', $post->title)

@section('block_id', 'blog_post_show')

@section('main')
    <h1>{{ $post->title }}</h1>

    <p class="post-metadata">
        <span class="metadata"><i class="fa fa-calendar"></i> {{ $post->published_at->format('F j, Y g:i A') }}</span>
        <span class="metadata"><i class="fa fa-user"></i> {{ $post->author->name }}</span>
    </p>

    <x-markdown :content="$post->content" />

    @include('blog.post_tags')

    <div id="post-add-comment" class="well">
{{--        TODO: Add comment form--}}
{{--        The 'IS_AUTHENTICATED_FULLY' role ensures that the user has entered--}}
{{--        their credentials (login + password) during this session. If they--}}
{{--        are automatically logged via the 'Remember Me' functionality, they won't--}}
{{--        be able to add a comment.--}}
{{--        See https://symfony.com/doc/current/security/remember_me.html#forcing-the-user-to-re-authenticate-before-accessing-certain-resources--}}
{{--        {% if is_granted('IS_AUTHENTICATED_FULLY') %}--}}
{{--        {{ render(controller('App\\Controller\\BlogController::commentForm', {'id': post.id})) }}--}}
{{--        {% else %}--}}
{{--        <p>--}}
{{--            <a class="btn btn-success" href="{{ route('security_login', ['redirect_to' => Request::path()]) }}">--}}
{{--                <i class="fa fa-sign-in" aria-hidden="true"></i> {{ 'action.sign_in' }}--}}
{{--            </a>--}}
{{--            {{ 'post.to_publish_a_comment' }}--}}
{{--        </p>--}}
{{--        {% endif %}--}}

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

{{--    TODO: Trans--}}
{{--    <h3>--}}
{{--        <i class="fa fa-comments" aria-hidden="true"></i> {{ 'post.num_comments'|trans({ 'count': post.comments|length }) }}--}}
{{--    </h3>--}}

    @forelse($post->comments as $comment)
        <div class="row post-comment">
            <h4 class="col-sm-3">
                <strong>{{ $comment->author->name }}</strong> {{ 'post.commented_on' }}
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

    @section('sidebar')
{{--        TODO: Is_granted--}}
{{--    {% if is_granted('edit', post) %}--}}
{{--    <div class="section">--}}
{{--        <a class="btn btn-lg btn-block btn-success" href="{{ path('admin_post_edit', {id: post.id}) }}">--}}
{{--            <i class="fa fa-edit" aria-hidden="true"></i> {{ 'action.edit_post'|trans }}--}}
{{--        </a>--}}
{{--    </div>--}}
{{--    {% endif %}--}}

        @parent

    {{--     TODO: Extensions--}}
    {{--    {{ show_source_code(_self) }}--}}
        @include('blog._rss')
    @endsection
@endsection
