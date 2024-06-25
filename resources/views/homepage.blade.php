<x-app-layout>
    <x-slot name="header">
        <h1 class="font-semibold text-xl text-gray-900 dark:text-white">{!! __('messages.title.homepage') !!}</h1>

        <livewire:language-selector />
    </x-slot>

    <div class="flex mx-auto">
        <div class="w-full px-4 sm:w-1/2">
            <div class="jumbotron">
                <p>
                    {!! __('messages.help.browse_app') !!}
                </p>
                <p>
                    <a href="{{ route('blog.index') }}" class="inline-block px-6 py-2 text-xs font-medium leading-6 text-center text-white uppercase transition bg-blue-500 rounded shadow ripple hover:shadow-lg hover:bg-blue-600 focus:outline-none">
                        <i class="fa fa-users" aria-hidden="true"></i> {{ __('messages.action.browse_app') }}
                    </a>
                </p>
            </div>
        </div>

        <div class="w-full px-4 sm:w-1/2">
            <div class="jumbotron">
                <p>
                    {!! __('messages.help.browse_admin') !!}
                </p>
                <p>
                    <a href="{{ route('admin.index') }}" class="inline-block px-6 py-2 text-xs font-medium leading-6 text-center text-white uppercase transition bg-blue-500 rounded shadow ripple hover:shadow-lg hover:bg-blue-600 focus:outline-none">
                        <i class="fa fa-lock" aria-hidden="true"></i> {{ __('messages.action.browse_admin') }}
                    </a>
                </p>
            </div>
        </div>
    </div>
</x-app-layout>

