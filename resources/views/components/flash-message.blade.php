<div>
    @foreach (['danger', 'warning', 'success', 'info'] as $key)
        @if(session()->has($key))
            <div class="alert alert-{{ $key }} alert-dismissible fade show" role="alert">
                <button type="button" class="close" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                {{ session()->get($key) }}
            </div>
        @endif
    @endforeach
</div>

