<x-app-layout>
    @if(isset($header))
        <x-slot name="header">
            {{ $header }}
        </x-slot>
    @endif

    {{ $slot }}

    @if(isset($sidebar))
        <x-slot name="sidebar">
            {{ $sidebar }}
        </x-slot>
    @endif

    @if(isset($footer))
        <x-slot name="footer">
            {{ $footer }}
        </x-slot>
    @endif

    @if(isset($body_id))
        <x-slot name="body_id">
            {{ $body_id }}
        </x-slot>
    @endisset

{{-- Ce bout de code n'est pas nécessaire. Je voulais juste montrer comment passer de la data au layout --}}
    <x-slot name="admin">
        <p class="my-auto px-4 text-gray-900 dark:text-white">{{ auth()->user()->name }} 👋</p>
    </x-slot>
</x-app-layout>
