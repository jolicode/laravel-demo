<form method="POST" action="{{ route('blog.comment.new', ['post' => $post]) }}" class="space-y-4">
    @csrf

    <div class="flex flex-col">
        @error('content')
        <div class="text-red-500 mt-2 text-sm">
            {{ $message }}
        </div>
        @enderror
        <label for="content" class="text-sm font-medium text-gray-700">Comment</label>
        <textarea id="content" name="content" rows="3" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border-gray-300 rounded-md">{{ old('content') }}</textarea>
    </div>

    <div>
        <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
            Submit
        </button>
    </div>
</form>
