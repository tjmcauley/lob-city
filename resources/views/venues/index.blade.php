<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Filter post by venue') }}
        </h2>

        <div class="py-12">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <ul>
                            @foreach ($venues as $venue)
                                <li><a href="{{ route('venues.show', $venue) }}"><b> {{ $venue->name }} </b></a></li>
                            @endforeach
                        </ul>

                        @can('admin')
                        <a href="{{ route('venues.create') }}">Add a venue</a>
                        @endcan
                    </div>
                </div>
            </div>
        </div>
    </x-slot>
</x-app-layout>