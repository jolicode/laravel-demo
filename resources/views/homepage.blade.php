{{--@extends('layouts.app')--}}

{{--@section('body_id', 'homepage')--}}

{{--@section('header')@endsection--}}
{{--@section('footer')@endsection--}}

{{--@section('body')--}}
{{--    <div class="page-header">--}}
{{--        <h1>{{ 'title.homepage' }}</h1>--}}
{{--        <h1 class="font-semibold leading-5">{{ 'Welcome to the Laravel Demo Application' }}</h1>--}}

{{--        TODO: Macro ici--}}
{{--        {% from 'default/_language_selector.html.twig' import render_language_selector %}--}}
{{--        {{ render_language_selector(true) }}--}}
{{--    </div>--}}

{{--    <div class="flex">--}}
{{--        <div class="w-full px-4 sm:w-1/2">--}}
{{--            <div class="jumbotron">--}}
{{--                <p>--}}
{{--                    {{ 'help.browse_app' }}--}}
{{--                </p>--}}
{{--                <p>--}}
{{--                    <a href="{{ route('blog.index') }}" class="inline-block px-6 py-2 text-xs font-medium leading-6 text-center text-white uppercase transition bg-blue-500 rounded shadow ripple hover:shadow-lg hover:bg-blue-600 focus:outline-none">--}}
{{--                        <i class="fa fa-users" aria-hidden="true"></i> {{ 'action.browse_app' }}--}}
{{--                    </a>--}}
{{--                </p>--}}
{{--            </div>--}}
{{--        </div>--}}

{{--        <div class="w-full px-4 sm:w-1/2">--}}
{{--            <div class="jumbotron">--}}
{{--                <p>--}}
{{--                    {{ 'help.browse_admin' }}--}}
{{--                </p>--}}
{{--                <p>--}}
{{--                    <a href="{{ route('blog.index') }}" class="inline-block px-6 py-2 text-xs font-medium leading-6 text-center text-white uppercase transition bg-blue-500 rounded shadow ripple hover:shadow-lg hover:bg-blue-600 focus:outline-none">--}}
{{--                        <i class="fa fa-lock" aria-hidden="true"></i> {{ 'action.browse_admin' }}--}}
{{--                    </a>--}}
{{--                </p>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--@endsection--}}

<x-app-layout>
    <x-slot name="header">
        {{--        <h1>{{ 'title.homepage' }}</h1>--}}
        <h1 class="font-semibold leading-5 text-gray-900 dark:text-gray-400">{{ 'Welcome to the Laravel Demo Application' }}</h1>

        {{--        TODO: Macro ici--}}
        {{--        {% from 'default/_language_selector.html.twig' import render_language_selector %}--}}
        {{--        {{ render_language_selector(true) }}--}}
    </x-slot>

    <div class="flex mx-auto">
        <div class="w-full px-4 sm:w-1/2">
            <div class="jumbotron">
                <p>
                    {{ 'help.browse_app' }}
                </p>
                <p>
                    <a href="{{ route('blog.index') }}" class="inline-block px-6 py-2 text-xs font-medium leading-6 text-center text-white uppercase transition bg-blue-500 rounded shadow ripple hover:shadow-lg hover:bg-blue-600 focus:outline-none">
                        <i class="fa fa-users" aria-hidden="true"></i> {{ 'action.browse_app' }}
                    </a>
                </p>
            </div>
        </div>

        <div class="w-full px-4 sm:w-1/2">
            <div class="jumbotron">
                <p>
                    {{ 'help.browse_admin' }}
                </p>
                <p>
                    <a href="{{ route('blog.index') }}" class="inline-block px-6 py-2 text-xs font-medium leading-6 text-center text-white uppercase transition bg-blue-500 rounded shadow ripple hover:shadow-lg hover:bg-blue-600 focus:outline-none">
                        <i class="fa fa-lock" aria-hidden="true"></i> {{ 'action.browse_admin' }}
                    </a>
                </p>
            </div>
        </div>
    </div>
</x-app-layout>

