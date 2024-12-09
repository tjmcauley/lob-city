<div>
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __(key: 'Viewing all posts') }}
            </h2>

            <livewire-create-post />

        </x-slot>
    </x-app-layout>
</div>