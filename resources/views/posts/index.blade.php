<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Posts') }}
        </h2>

        <div class="py-12">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <ul>
                            @foreach ($posts as $post)
                            <h2> {{ $post->caption }} </h2>
                            <li style="list-style: none;">
                                <img src="{{ asset('/storage/' . $post->image_name) }}" />
                                <ul>
                                    @foreach ($comments as $comment)
                                    @if ($comment->post_id === $post->id)
                                    <li style="list-style: none;">
                                        "{{ $comment->content }}"
                                    </li>
                                    @endif
                                </ul>
                                @endforeach

                                <!-- Form to leave comments -->
                                <!-- Session Status -->
                                <form method="POST" action="{{ route('comments.store', ['post' => $post]) }}">
                                    @csrf
                                    <!-- Comment content -->
                                    <div class="mt-4">
                                        <x-text-input name="content" class="block mt-1 w-full" type="text"
                                            value="{{ old('content') }}" />
                                    </div>

                                    <div class="flex items-center justify-end mt-4">
                                        <x-primary-button class="ms-3">
                                            {{ __('Comment') }}
                                        </x-primary-button>
                                    </div>
                                </form>
                            </li>
                            @endforeach
                        </ul>

                        <a href="{{ route('posts.create') }}">Create a post</a>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </x-slot>
</x-app-layout>