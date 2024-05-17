@props(['content'])

<div class="markdown-content text-gray-900 dark:text-gray-300">
    {!! Str::markdown($content) !!}
</div>
