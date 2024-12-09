<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Filter posts by city') }}
        </h2>

        <div class="py-12">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <ul>
                            @foreach ($cities as $city)
                            <li>
                                <div class="flex items-center justify-end py-2">
                                    <a href="{{ route('cities.show', $city) }}"><u> {{ $city->name }} </u></a>

                                    @can('admin')
                                    <form method="POST" action="{{ route('cities.destroy', ['city' => $city]) }}">
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

                        @can(abilities: 'admin')
                        <a href="{{ route('cities.create') }}">Add a city</a>
                        @endcan
                    </div>
                </div>
            </div>
        </div>
    </x-slot>
</x-app-layout>