<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ $venue->name }}
        </h2>

        <div class="grid grid-cols-3 gap-4 text-white">
            @foreach ($posts as $post)
            @foreach ($post->tags as $tag)
            @if ($tag->name === $venue->name)
            <div>
                <h2> {{ $post->caption }} </h2>
                <img src="{{ asset('/storage/' . $post->image_name) }}" />
            </div>

            <div class="text-lg font-semibold text-white">
                <div class="text-white p-4 rounded-lg shadow-lg max-w-2xl mx-auto">
                    <livewire-create-comment :post="$post" />
                </div>
            </div>

            @endif
            @endforeach
            @endforeach
        </div>
    </x-slot>
</x-app-layout>