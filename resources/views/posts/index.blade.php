<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Posts') }}
        </h2>

        <livewire-create-post />

        <a href="{{ route('posts.create') }}">Create a post</a>
    </x-slot>
</x-app-layout>