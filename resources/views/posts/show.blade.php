<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Posts by <u>{{ $user->email }}</u>
        </h2>
        <div class="grid grid-cols-3 gap-4 text-white border-2 border-black">
            @foreach ($posts as $post)
            @if ($post->user_id === $user->id)
            <div>
                <div
                    class="text-white text-lg font-semibold text-center bg-gray-800 p-4 rounded-lg shadow-lg max-w-md mx-auto">
                    <h2> posted on - {{$post->created_at->format('m-d H:i')}} </h2>
                    <h2> {{ $post->caption }} </h2>
                </div>

                <div class="flex flex-col sm:justify-center items-center pt-6 sm:pt-0">

                    @can('deletable', ['post' => $post])
                    <form method="POST" action="{{ route('posts.destroy', ['post' => $post]) }}">
                        @csrf
                        @method("DELETE")
                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button class="ms-3">
                                {{ __('Delete') }}
                            </x-primary-button>
                        </div>
                    </form>
                    @endcan

                    @can('editable', ['post' => $post])
                    <a href="{{ route('posts.edit', ['post' => $post]) }}" title="Click to edit this post">Edit Post</a>
                    @endcan
                </div>

                <img src="{{ asset('/storage/' . $post->image_name) }}" />
                <livewire-create-comment :post="$post">
            </div>
            @endif
            @endforeach
        </div>

        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight pt-10">
            Comments by <u>{{ $user->email }}</u>
        </h2>

        <div class="grid grid-cols-3 gap-4 text-white border-2 border-black">

            @foreach ($posts as $post)
            @foreach ($post->comments as $comment)
            @if($comment->user_id === $user->id)
            <div class="shadow-lg p-4 min-w-full">
                <h2>
                    <center>{{ $comment->user->email }}: {{ $comment->content }} </center>
                </h2>
            </div>
            @endif
            @endforeach
            @endforeach
        </div>
    </x-slot>
</x-app-layout>