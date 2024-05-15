@extends('layouts.app')

@section('body_id', 'blog_index')

@section('main')
    {{--                TODO: Pagination--}}
    @forelse($posts as $post)
        @include('blog._post')
    @empty
        <div class="jumbotron">{{ 'post.no_posts_found' }}</div>
    @endforelse

{{--                TODO: Pagination--}}
    {{--    @if($paginator->hasToPaginate) @endif--}}
        <div class="navigation text-center">
            <ul class="pagination pagination-lg">
{{--                TODO: Pagination--}}
{{--                @if($paginator->previousPage->hadPreviousPage)--}}
{{--                <li class="page-item">--}}
{{--                    <a class="page-link" href="{{ route('blog.index_paginated', {page: paginator.previousPage, tag: tagName}) }}" rel="previous">--}}
{{--                    <a class="page-link" href="{{ route('blog.index_paginated', ['page' => 1, 'tag' => $tagName]) }}" rel="previous">--}}
{{--                        <i class="fa fw fa-long-arrow-left"></i> {{ 'paginator.previous' }}--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--                @else--}}
                <li class="page-item disabled">
                    <span class="page-link"><i class="fa fw fa-arrow-left"></i> {{ 'paginator.previous' }}</span>
                </li>
{{--                @endif--}}

                {{--                TODO: Pagination--}}
{{--                {% for i in 1..paginator.lastPage %}--}}
{{--                {% if i == paginator.currentPage %}--}}
{{--                <li class="page-item active">--}}
{{--                    <span class="page-link">{{ $i }} <span class="sr-only">{{ 'paginator.current' }}</span></span>--}}
{{--                </li>--}}
{{--                {% else %}--}}
{{--                <li class="page-item"><a class="page-link" href="{{ route('blog_index_paginated', ['page' => $i, 'tag' => $tagName]) }}">{{ $i }}</a></li>--}}
{{--                {% endif %}--}}
{{--                {% endfor %}--}}

{{--                {% if paginator.hasNextPage %}--}}
{{--                <li class="page-item">--}}
{{--                    <a class="page-link" href="{{ path('blog_index_paginated', {page: paginator.nextPage, tag: tagName}) }}">--}}
{{--                        <span>{{ 'paginator.next'|trans }} <i class="fa fw fa-long-arrow-right"></i></span>--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--                {% else %}--}}
{{--                <li class="page-item disabled">--}}
{{--                    <span class="page-link">{{ 'paginator.next'|trans }} <i class="fa fw fa-long-arrow-right"></i></span>--}}
{{--                </li>--}}
{{--                {% endif %}--}}
            </ul>
        </div>
{{--    @endif--}}
@endsection

@section('sidebar')
    @parent
{{--    TODO: Blade extension--}}
{{--    {{ show_source_code(_self) }}--}}
    @include('blog/_rss')

@endsection
