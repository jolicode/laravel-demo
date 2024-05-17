<x-app-layout>
    <x-slot name="title">Search results for: {{ $query }}</x-slot>

    <x-slot name="block_id">blog_search</x-slot>

    <livewire:search />

    {{--@section('sidebar')--}}
    {{--    @parent--}}

    {{--    TODO: Extensions--}}
    {{--    {{ show_source_code(_self) }}--}}
    {{--@endsection--}}
</x-app-layout>
