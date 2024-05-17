@extends('layouts.app')

@section('title', 'Search results for: ' . $query)

@section('block_id', 'blog_search')

@section('main')
    <livewire:search />
@endsection

@section('sidebar')
    @parent

{{--    TODO: Extensions--}}
{{--    {{ show_source_code(_self) }}--}}
@endsection
