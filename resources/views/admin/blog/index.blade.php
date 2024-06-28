<x-admin-layout>
    <x-slot name="body_id">blog_admin</x-slot>

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg my-12">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">{{ __('messages.label.title') }}</th>
                <th scope="col" class="px-6 py-3"><i class="fa fa-calendar" aria-hidden="true"></i> {{ __('messages.label.published_at') }}</th>
                <th scope="col" class="px-6 py-3 text-right" class="text-center"><i class="fa fa-cogs" aria-hidden="true"></i> {{ __('messages.label.actions') }}</th>
            </tr>
            </thead>
            <tbody>
            @forelse($posts as $post)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <td class="px-6 py-4">
                        {{ $post->title }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $post->published_at->translatedFormat('M j, Y g:i A') }}
                    </td>
                    <td class="px-6 py-4 text-right">
                        <div class="flex">
                            <a href="{{ route('admin.post_show', ['post' => $post]) }}" class="btn btn-sm btn-secondary" wire:navigate>
                                <i class="fa fa-eye" aria-hidden="true"></i> {{ __('messages.action.show') }}
                            </a>

                            <a href="{{ route('admin.post_edit', ['post' => $post]) }}" class="btn btn-sm btn-primary" wire:navigate>
                                <i class="fa fa-edit" aria-hidden="true"></i> {{ __('messages.action.edit') }}
                            </a>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" align="center">{{ __('messages.post.no_posts_found') }}</td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>

    {{ $posts->links() }}

    <x-slot name="sidebar">
        <x-primary-button tag="a" href="{{ route('admin.post_new') }}">
            <i class="fas fa-plus"></i> {{ __('Create Post') }}
        </x-primary-button>

        <x-sidebar />
    </x-slot>

</x-admin-layout>
