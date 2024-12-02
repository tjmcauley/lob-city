<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create a Post') }}
        </h2>
    </x-slot>

    <body class="font-sans text-gray-900 antialiased">
        <div
            class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100 dark:bg-gray-900">
            <!-- Session Status -->
            <form method="POST" action="{{ route('posts.store') }}" enctype="multipart/form-data">
                @csrf
                <!-- Image to post -->
                <div>
                    <x-input-label for="image" :value="__('Image')" />
                    <x-text-input name="image" class="block mt-1 w-full" type="file" value="{{ old('image') }}" />
                </div>

                <!-- Caption -->
                <div class="mt-4">
                    <x-input-label for="caption" :value="__('Caption')" />
                    <x-text-input name="caption" class="block mt-1 w-full" type="text" value="{{ old('caption') }}" />
                </div>

                <div class="flex items-center justify-end mt-4">
                    <x-primary-button class="ms-3">
                        {{ __('Post') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </body>
</x-app-layout>
