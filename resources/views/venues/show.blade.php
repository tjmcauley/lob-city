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
            <div class=" flex flex-col sm:justify-center items-center pt-6 sm:pt-0">
                @can('authorised', ['post' => $post])
                <form method="POST" action="{{ route('posts.destroy', ['post' => $post]) }}">
                    @csrf
                    @method("DELETE")
                    <div class="flex items-center justify-end mt-4">
                        <x-primary-button class="ms-3">
                            {{ __('Delete') }}
                        </x-primary-button>
                    </div>
                </form>
                <a href="{{ route('posts.edit', ['post' => $post]) }}">Edit Post</a>
                @endcan
            </div>
            @endif
            @endforeach
            @endforeach
        </div>
    </x-slot>
</x-app-layout>