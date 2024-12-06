<x-app-layout>
    <x-slot name="header">
        <div class="grid grid-cols-3 gap-4 text-white">
            @foreach ($posts as $post)
            @if ($post->user_id === $user->id)
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
                <a href="{{ route('posts.edit', ['post' => $post]) }}">Edit a team</a>
                @endcan
            </div>
            @endif
            @endforeach
        </div>
    </x-slot>
</x-app-layout>