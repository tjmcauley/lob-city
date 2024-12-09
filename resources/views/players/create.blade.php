<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Add a Player') }}
        </h2>
    </x-slot>

    <body class="font-sans text-gray-900 antialiased">
        <div
            class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100 dark:bg-gray-900">
            <!-- Session Status -->
            <form method="POST" action="{{ route('players.store') }}">
                @csrf
                <!-- Player Name -->
                <div>
                    <x-input-label for="name" :value="__('Player Name')" />
                    <x-text-input name="name" class="block mt-1 w-full" type="text" value="{{ old('name') }}" />

                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <!-- Team -->
                <div class="mt-4">
                    <x-input-label for="team_id" :value="__('Team')" />
                    <select name="team_id">
                        @foreach ($teams as $team)
                        <option value="{{ $team->id }}">
                            {{ $team->name  }}
                        </option>
                        @endforeach
                    </select>

                    <x-input-error :messages="$errors->get('team_id')" class="mt-2" />
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