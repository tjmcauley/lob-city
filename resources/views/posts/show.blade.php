<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Viewing posts by <u>{{ $user->email }}</u>
        </h2>
        <div class="grid grid-cols-3 gap-4 text-white">
            @foreach ($posts as $post)
            @if ($post->user_id === $user->id)
            <div>
                <div
                    class="text-white text-lg font-semibold text-center bg-gray-800 p-4 rounded-lg shadow-lg max-w-md mx-auto">
                    <h2> posted on - {{$post->created_at->format('m-d H:i')}} </h2>
                    <h2> {{ $post->caption }} </h2>
                </div>
                <img src="{{ asset('/storage/' . $post->image_name) }}" />
                <div class="text-white p-4 rounded-lg shadow-lg max-w-2xl mx-auto">
                    <livewire-create-comment :post="$post" />
                </div>
            </div>
            @endif
            @endforeach
        </div>
    </x-slot>
</x-app-layout>