<div>
    @foreach (['danger', 'warning', 'success', 'info'] as $key)
        @if(session()->has($key))
            <div class="alert alert-{{ $key }} alert-dismissible fade show" role="alert">
                {{ session()->get($key) }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
    @endforeach
</div>

