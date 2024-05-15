@props(['content'])

<div class="markdown-content">
    {!! Str::markdown($content) !!}
</div>
