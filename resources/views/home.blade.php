<x-app-layout>
    <x-slot name="header">
        <img class="object-cover opacity-40 w-full"
            src="https://24.media.tumblr.com/4f128698c69f95a8881793b021cf2014/tumblr_mjan9lpopZ1rfimo0o1_400.gif">
        <section class="absolute top-2/4 left-2/4 -translate-x-2/4 -translate-y-2/4 text-white font-serif">
            <center>
                <h1 class="text-9xl"> Lob City </h1>
                <h2 class="text-5xl"> Hoopers' Network</h2>
            </center>
        </section>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 flex justify-center items-center">
                    {{ __("My Posts") }}
                </div>

                <ul>
                    <div class="grid grid-cols-3 gap-4 text-white">
                        @foreach (Auth::user()->posts as $post)
                        <li style="list-style: none;">
                            <div class="text-lg font-semibold text-white">

                                <div
                                    class="text-white text-lg font-semibold text-center bg-gray-800 p-4 rounded-lg shadow-lg max-w-md mx-auto">
                                    <a href="{{ route('posts.show', $post->user) }}">
                                        <h2> posted on - {{$post->created_at->format('m-d H:i')}} </h2>
                                    </a>
                                    <h2> {{ $post->caption }} </h2>
                                </div>

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
                                    <button action="{{ route('posts.edit', ['post' => $post]) }}">
                                        Edit Post
                                    <button>
                                    @endcan
                                </div>

                                <div class="flex justify-center items-center space-x-4 p-4">
                                    <img src="{{ asset('/storage/' . $post->image_name) }}" />
                                </div>

                                <div class="text-white p-4 rounded-lg shadow-lg max-w-2xl mx-auto">
                                    <livewire-create-comment :post="$post" />
                                </div>
                        </li>
                        @endforeach
                    </div>
                </ul>
            </div>
        </div>
    </div>
</x-app-layout>