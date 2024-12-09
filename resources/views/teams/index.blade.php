<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Filter posts by team') }}
        </h2>

        <div class="py-12">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <ul>
                            @foreach ($teams as $team)
                            <li>
                                <div class="flex items-center justify-end py-2">
                                    <a href="{{ route('teams.show', $team) }}"><u> {{ $team->name }} </u></a>

                                    @can('admin')
                                    <form method="POST" action="{{ route('teams.destroy', ['team' => $team]) }}">
                                        @csrf
                                        @method("DELETE")
                                        <x-primary-button class="ms-3">
                                            {{ __('Delete') }}
                                        </x-primary-button>
                                    </form>
                                    @endcan
                                </div>
                            </li>
                            @endforeach
                        </ul>

                        @can('admin')
                        <a href="{{ route('teams.create') }}">Add a team</a>
                        @endcan
                    </div>
                </div>
            </div>
        </div>
    </x-slot>
</x-app-layout>