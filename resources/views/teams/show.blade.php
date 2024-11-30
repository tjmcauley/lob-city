<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ $team->name }}
        </h2>
    </x-slot>

    <body class="font-sans text-gray-900 antialiased">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100 dark:bg-gray-900">
            <!-- Session Status -->
            @can('admin')
            <form method="POST" action="{{ route('teams.destroy', ['team' => $team]) }}">
                @csrf
                @method("DELETE")
                <div class="flex items-center justify-end mt-4">
                    <x-primary-button class="ms-3">
                        {{ __('Delete') }}
                    </x-primary-button>
                </div>
            </form>
            @endcan
        </div>
    </body>
</x-app-layout>