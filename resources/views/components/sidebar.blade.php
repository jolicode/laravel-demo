@props(['content'])

<div>
    {{--                    TODO: Pas d'équivalent, va falloit @include?--}}
    {{--                {{ render_esi(controller('Symfony\\Bundle\\FrameworkBundle\\Controller\\TemplateController::templateAction', {--}}
    {{--                'template': 'blog/about.html.twig',--}}
    {{--                'sharedAge': 600,--}}
    {{--                '_locale': app.request.locale--}}
    {{--                })) }}--}}

    {!! $content ?? '' !!}
</div>

