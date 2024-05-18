<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title ?? config('app.name', 'Laravel') }}</title>

    <link rel="alternate" type="application/rss+xml" title="{{ 'rss.title' }}" href="{{ route('blog.rss') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
          integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{--    Those two blocks defines frontend entrypoint for CSS and JavaScript assets--}}
    @section('stylesheets')@endsection
    @section('javascripts')@endsection
</head>
<body class="font-sans antialiased" id="{{ $body_id ?? '' }}">
<div class="min-h-screen bg-gray-100 dark:bg-gray-900">
    @include('layouts.navigation', ['admin' => $admin ?? ''])

    <!-- Page Heading -->
    @if (isset($header))
        <header class="bg-white dark:bg-gray-800 shadow">
            <div class="max-w-7xl mx-auto py-2 px-4 sm:px-6 lg:px-8">
                {{ $header }}
            </div>
        </header>
    @endif

    <!-- Page Content -->
    <div class="container body-container mx-auto px-3 max-w-5xl my-12">
        <div class="flex gap justify-center">
            <main id="main">
                <x-flash-message />

                {{ $slot }}
            </main>

            <aside id="sidebar">
                @if(isset($sidebar))
                    {{ $sidebar }}
                @else
                    <x-sidebar />
                @endif
            </aside>
        </div>
    </div>

    @if(isset($footer))
        {{ $footer }}
    @else
        <footer class="bg-white dark:bg-gray-800 shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between">
                    <div id="footer-copyright" class="col-md-6">
                        <p>{{ now()->format('Y') }} - The Symfony Project</p>
                        <p>{{ 'mit_license' }}</p>
                    </div>
                    <div id="footer-resources" class="col-md-6">
                        <p>
                            <a rel="noopener noreferrer" target="_blank" href="https://twitter.com/symfony"
                               title="Symfony on X (formerly Twitter)">
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
    @endif
</div>
</body>
</html>
