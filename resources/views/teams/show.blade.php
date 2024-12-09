<x-app-layout>
    <x-slot name="header">
        <div class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            <h2>
                Viewing <u>{{ $team->name }}</u> tagged posts
            </h2>
        </div>

        <div class="grid grid-cols-3 gap-4 text-white">
            @foreach ($posts as $post)
            @foreach ($post->tags as $tag)
            @if ($tag->name === $team->name)

            <div
                class="text-white text-lg font-semibold text-center bg-gray-800 p-4 rounded-lg shadow-lg max-w-md mx-auto">
                <a href="{{ route('posts.show', $post->user) }}">
                    <h1> <u>{{ $post->user->email }}</u> </h1> posted on - {{$post->created_at->format('m-d H:i')}}
                </a>
                <h2> {{ $post->caption }} </h2>
            </div>

            <div class="flex justify-center items-center space-x-4 p-4">
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