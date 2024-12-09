<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Add a Venue') }}
        </h2>
    </x-slot>

    <body class="font-sans text-gray-900 antialiased">
        <div
            class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100 dark:bg-gray-900">
            <!-- Session Status -->
            <form method="POST" action="{{ route('venues.store') }}">
                @csrf
                <!-- Venue Name -->
                <div>
                    <x-input-label for="name" :value="__('Team Name')" />
                    <x-text-input name="name" class="block mt-1 w-full" type="text" value="{{ old('name') }}" />
                </div>

                <!-- City -->
                <div class="mt-4">
                    <x-input-label for="city" :value="__('City')" />
                    <select name="city_id">
                        @foreach ($cities as $city)
                        <option value="{{ $city->id }}">
                            {{ $city->name  }}
                        </option>
                        @endforeach
                    </select>
                </div>

                <div class="flex items-center justify-end mt-4">
                    <x-primary-button class="ms-3">
                        {{ __('Submit') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </body>
</x-app-layout>