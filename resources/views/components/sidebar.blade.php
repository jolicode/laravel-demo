@props(['content'])

<div>
    {{--                {{ render_esi(controller('Symfony\\Bundle\\FrameworkBundle\\Controller\\TemplateController::templateAction', {--}}
    {{--                'template': 'blog/about.html.twig',--}}
    {{--                'sharedAge': 600,--}}
    {{--                '_locale': app.request.locale--}}
    {{--                })) }}--}}

    {{ view('blog.about') }}

    {!! $content ?? '' !!}

</div>

