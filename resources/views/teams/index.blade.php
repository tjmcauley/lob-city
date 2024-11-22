<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Teams in the NBA') }}
        </h2>

        <div class="py-12">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <ul>
                            @foreach ($teams as $team)
                                <li><a href="{{ route('teams.show', $team) }}"><b> {{ $team->name }} </b></a></li>
                            @endforeach
                        </ul>

                        <a href="{{ route('teams.create') }}">Add a team</a>
                    </div>
                </div>
            </div>
        </div>
    </x-slot>
</x-app-layout>