<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit a Post') }}
        </h2>
    </x-slot>

    <body class="font-sans text-gray-900 antialiased">
        <div
            class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100 dark:bg-gray-900">
            <!-- Session Status -->
            <form method="POST" action="{{ route('posts.update', ['post' => $post]) }}" enctype="multipart/form-data">
                @csrf
                @method("PUT")
                <!-- Image to post -->
                <div class="mt-4">
                    <x-input-label for="image" :value="__('Image')" />
                    <x-text-input name="image" class="block mt-1 w-full" type="file" value="{{ old('image') }}" />
                </div>

                <!-- Caption -->
                <div class="mt-4">
                    <x-input-label for="caption" :value="__('Caption')" />
                    <x-text-input name="caption" class="block mt-1 w-full" type="text" value="{{ old('caption') }}" />
                </div>

                <!-- Tag Dropdown Content -->
                <div class="mt-4">
                    <x-input-label for="tag" :value="__('Tag')" />
                    <select name="tag_id">
                        @foreach ($tags as $tag)
                        <option value="{{ $tag->id }}">
                            {{ $tag->name }}
                        </option>
                        @endforeach
                    </select>
                </div>

                <div class="flex items-center justify-end mt-4">
                    <x-primary-button class="ms-3">
                        {{ __('Update') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </body>
</x-app-layout>