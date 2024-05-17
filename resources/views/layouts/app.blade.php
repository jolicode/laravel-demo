<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        <meta name="view-transition" content="same-origin" />
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>@yield('title', config('app.name', 'Laravel'))</title>

        <link rel="alternate" type="application/rss+xml" title="{{ 'rss.title' }}" href="{{ route('blog.rss') }}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

        @vite(['resources/css/app.css', 'resources/js/app.js'])

        {{--    Those two blocks defines frontend entrypoint for CSS and JavaScript assets--}}
        @section('stylesheets')@endsection
        @section('javascripts')@endsection

        <link rel="shortcut icon" type="image/svg+xml" href="{{ asset('favicon.svg') }}">
    </head>
    <body id="@yield('body_id')">
            @section('header')
                <header>
                    @include('layouts.navigation')
                </header>
            @show

            <div class="container body-container mx-auto px-3 max-w-5xl">
                @section('body')
                    <div class="row">
                        <div id="main" class="col-sm-9">
                            {{--                {{ include('default/_flash_messages.html.twig') }}--}}
                            @section('main')
                            @show
                        </div>

                        <div id="sidebar" class="col-sm-3">
                           @section('sidebar')
                                {{--                    TODO: Pas d'équivalent, va falloit @include?--}}
                                {{--                {{ render_esi(controller('Symfony\\Bundle\\FrameworkBundle\\Controller\\TemplateController::templateAction', {--}}
                                {{--                'template': 'blog/about.html.twig',--}}
                                {{--                'sharedAge': 600,--}}
                                {{--                '_locale': app.request.locale--}}
                                {{--                })) }}--}}
                            @show
                        </div>
                    </div>
                @show
            </div>

            @section('footer')
                <footer>
                    <div class="container mx-auto">
                        <div class="row">
                            <div id="footer-copyright" class="col-md-6">
                                <p>{{ now()->format('Y') }} - The Symfony Project</p>
                                <p>{{ 'mit_license' }}</p>
                            </div>
                            <div id="footer-resources" class="col-md-6">
                                <p>
                                    <a rel="noopener noreferrer" target="_blank" href="https://twitter.com/symfony" title="Symfony on X (formerly Twitter)">
                                        <i class="fa-brands fa-x-twitter" aria-hidden="true"></i>
                                    </a>
                                    <a target="_blank" href="https://symfony.com/blog/" title="Symfony Blog">
                                        <i class="fa-solid fa-rss" aria-hidden="true"></i>
                                    </a>
                                </p>
                            </div>
                        </div>
                    </div>
                </footer>
            @show
        <!-- Page rendered on {{ \Carbon\Carbon::now(new \DateTimeZone('UTC'))->format('F d, Y h:i:s A') }} -->
    </body>
</html>
