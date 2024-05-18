<x-admin-layout>
    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
        <div class="bg-gray-800 p-6 rounded-lg shadow-md">
            <form action="{{ route('admin.post_store') }}" method="POST">
                @csrf

                <div class="mb-4">
                    @error('title')
                        {{ $message }}
                    @enderror
                    @error('slug')
                    {{ $message }}
                    @enderror
                    <label for="title" class="block text-sm font-medium text-white">Title</label>
                    <input type="text" name="title" id="title" value="{{ old('title') }}" class="mt-1 block w-full py-2 px-3 border border-gray-700 bg-gray-900 text-gray-900 dark:text-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                </div>

                <div class="mb-4">
                    @error('summary')
                        {{ $message }}
                    @enderror
                    <label for="summary" class="block text-sm font-medium text-white">Summary</label>
                    <input name="summary" id="summary" value="{{ old('summary') }}" rows="4" class="mt-1 block w-full py-2 px-3 border border-gray-700 bg-gray-900 text-gray-900 dark:text-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    <small class="text-gray-500">No Markdown here</small>
                </div>

                <div class="mb-4">
                    @error('content')
                        {{ $message }}
                    @enderror
                    <label for="content" class="block text-sm font-medium text-white">Content</label>
                    <textarea name="content" id="content" rows="4" class="mt-1 block w-full py-2 px-3 border border-gray-700 bg-gray-900 text-gray-900 dark:text-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">{{ old('content') }}</textarea>
                </div>

                <div class="mb-4">
                    @error('published_at')
                    {{ $message }}
                    @enderror
                    <label for="published_at" class="block text-sm font-medium text-white">Published At</label>
                    <input type="datetime-local" name="published_at" id="published_at" value="{{ old('published_at') }}" class="mt-1 block w-full py-2 px-3 border border-gray-700 bg-gray-900 text-gray-900 dark:text-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                </div>

                <div class="mb-4">
                    @error('tags')
                        {{ $message }}
                    @enderror
                    <label for="tags" class="block text-sm font-medium text-white">Tags</label>
                    <input name="tags" id="tags" type="text" class="mt-1 block w-full py-2 px-3 border border-gray-700 bg-gray-900 text-gray-900 dark:text-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                </div>

                <div>
                    <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Submit
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-admin-layout>
