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
                <div class="flex flex-col sm:justify-center items-center pt-6 sm:pt-0">
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
            </div>
            @endif
            @endforeach
        </div>
    </x-slot>
</x-app-layout>