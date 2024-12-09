<x-app-layout>
    <x-slot name="header">
        <div class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            <h2>
                Viewing <u>{{ $player->name }}</u> tagged posts
            </h2>
        </div>

        <div class="grid grid-cols-3 gap-4 text-white">
            @foreach ($posts as $post)
            @foreach ($post->tags as $tag)
            @if ($tag->name === $player->name)
            <div>
                <div
                    class="text-white text-lg font-semibold text-center bg-gray-800 p-4 rounded-lg shadow-lg max-w-md mx-auto">
                    <h2> posted on - {{$post->created_at->format('m-d H:i')}} </h2>
                    <h2> {{ $post->caption }} </h2>
                </div>
                <img src="{{ asset('/storage/' . $post->image_name) }}" />
                <div class="flex flex-col sm:justify-center items-center pt-6 sm:pt-0">
                    <livewire-create-comment :post="$post" />
                </div>
            </div>

            @endif
            @endforeach
            @endforeach
        </div>
    </x-slot>
</x-app-layout>