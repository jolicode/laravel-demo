<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <meta name="view-transition" content="same-origin" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="alternate" type="application/rss+xml" title="{{ 'rss.title' }}" href="{{ route('blog.rss') }}">


    @vite(['resources/css/app.css', 'resources/js/app.js'])

{{--    Those two blocks defines frontend entrypoint for CSS and JavaScript assets--}}
    <x-slot name="stylesheets"></x-slot>
    <x-slot name="javascripts"></x-slot>

    <link rel="shortcut icon" type="image/svg+xml" href="{{ asset('favicon.svg') }}">
</head>

<body id="{{ $body_id ?? '' }}">

{{--<x-slot name="header">--}}
{{--    <header>--}}
{{--        <nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-primary">--}}
{{--            <div class="container">--}}
{{--                <a class="navbar-brand" href="{{ route('homepage') }}">--}}
{{--                    <u>Symfony</u> Laravel Demo--}}
{{--                </a>--}}
{{--                <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#appNavbar" aria-controls="appNavbar" aria-expanded="false" aria-label="Toggle navigation">--}}
{{--                    <span class="navbar-toggler-icon"></span>--}}
{{--                </button>--}}

{{--                <div class="navbar-collapse collapse" id="appNavbar">--}}
{{--                    <ul class="navbar-nav ml-auto">--}}
{{--                        <x-navigation :route="Route::currentRouteName()"/>--}}
{{--                    </ul>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </nav>--}}
{{--    </header>--}}
{{--</x-slot>--}}

<div class="container body-container">
    <x-slot name="body">
        <div class="row">
            <div id="main" class="col-sm-9">
{{--                {{ include('default/_flash_messages.html.twig') }}--}}

                <x-slot name="main"></x-slot>
            </div>

            <div id="sidebar" class="col-sm-3">
                <x-slot name="sidebar">
{{--                    TODO: Pas d'équivalent, va falloit @include?--}}
{{--                {{ render_esi(controller('Symfony\\Bundle\\FrameworkBundle\\Controller\\TemplateController::templateAction', {--}}
{{--                'template': 'blog/about.html.twig',--}}
{{--                'sharedAge': 600,--}}
{{--                '_locale': app.request.locale--}}
{{--                })) }}--}}
                </x-slot>
            </div>
        </div>
    </x-slot>
</div>

{{--<x-slot name="footer">--}}
{{--    <footer>--}}
{{--        <div class="container">--}}
{{--            <div class="row">--}}
{{--                <div id="footer-copyright" class="col-md-6">--}}
{{--                    <p>&copy; {{ 'now'|date('Y') }} - The Symfony Project</p>--}}
{{--                    <p>{{ 'mit_license' }}</p>--}}
{{--                </div>--}}
{{--                <div id="footer-resources" class="col-md-6">--}}
{{--                    <p>--}}
{{--                        <a rel="noopener noreferrer" target="_blank" href="https://twitter.com/symfony" title="Symfony on X (formerly Twitter)">--}}
{{--                            <i class="fa-brands fa-x-twitter" aria-hidden="true"></i>--}}
{{--                        </a>--}}
{{--                        <a target="_blank" href="https://symfony.com/blog/" title="Symfony Blog">--}}
{{--                            <i class="fa-solid fa-rss" aria-hidden="true"></i>--}}
{{--                        </a>--}}
{{--                    </p>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </footer>--}}
{{--</x-slot>--}}

{{--it's not mandatory to set the timezone in localizeddate(). This is done to--}}
{{--avoid errors when the 'intl' PHP extension is not available and the application--}}
{{--is forced to use the limited "intl polyfill", which only supports UTC and GMT--}}
<!-- Page rendered on {{ \Carbon\Carbon::now(new \DateTimeZone('UTC'))->format('F d, Y h:i:s A') }} -->
</body>
</html>
