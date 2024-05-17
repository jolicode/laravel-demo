<div>
    <input wire:model.live="search" type="text" placeholder="Search...">
    @if (!empty($search))
        @if (count($results) > 0)
            @foreach ($results as $post)
                @include('blog._post')
            @endforeach
        @else
            <p>No results found for "{{ $search }}".</p>
        @endif
    @endif
</div>
