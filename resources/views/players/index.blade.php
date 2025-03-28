<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Filter posts by players') }}
        </h2>

        <div class="py-12">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <ul>
                            @foreach ($players as $player)
                            <li>
                                <div class="flex items-center justify-end py-2">
                                    <a href="{{ route('players.show', $player) }}"
                                        title="View posts tagged with {{ $player->name }}"><u> {{ $player->name }}
                                        </u></a>

                                    @can('admin')
                                    <form method="POST" action="{{ route('players.destroy', ['player' => $player]) }}">
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
                        <a href="{{ route('players.create') }}">Add a player</a>
                        @endcan
                    </div>
                </div>
            </div>
        </div>
    </x-slot>
</x-app-layout>