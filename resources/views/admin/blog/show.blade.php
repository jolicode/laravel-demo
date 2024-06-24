<x-admin-layout>

    <h1 class="text-gray-900 dark:text-white">{{ $post->title }}</h1>

    <p class="post-metadata">
        <span class="metadata"><i class="fa fa-calendar"></i> {{ $post->published_at->format('F j, Y g:i A') }}</span>
        <span class="metadata"><i class="fa fa-user"></i> {{ $post->author->name }}</span>
    </p>

    <x-markdown :content="$post->content" />

    @include('blog.post_tags')

    <x-slot name="sidebar">
        <div class="mb-4">
            <a href="{{ route('admin.post_edit', $post) }}" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Edit
            </a>
        </div>

        <div class="mb-4">
            <livewire:delete :post-id="$post->id"/>
        </div>
    </x-slot>
</x-admin-layout>
