<x-app-layout>
    <x-slot name="header">
        <div class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            <h2>
                Viewing <u>{{ $player->name }}</u> tagged posts
            </h2>
        </div>

        <h2 class="text-center pt-5 mb-4 text-3xl font-extrabold text-gray-900 dark:text-white md:text-5xl lg:text-6xl">
            About <span class="text-transparent bg-clip-text bg-gradient-to-r to-emerald-600 from-sky-400">
                {{ $player->name }} </span></h2>

        <div class="text-center text-xl text-gray-800 dark:text-gray-200 leading-tight italic p-2">
            <p class="p-1">
                "{{ $player->name }} is a professional basketball player for the {{ $player->team->name }}."
            </p>
            @if ($player->stats->count() != 0)
            <p class="p-1">
                "In their latest playing season, they scored {{ $recent_stats->points }} points and
                made {{ $recent_stats->assists }} dimes." </p>
            <p class="p-1"> "Defensively they have also contributed {{ $recent_stats->blocks }} blocks and
                {{ $recent_stats->steals }} steals." </p>

            <p class="pt-5">
                "Across their career, {{ $player->name }} has totalled {{ $career_games }} games played,
            <p> {{ $career_points }} points, {{ $career_assists }} assists, {{ $career_blocks }} blocks and
                {{ $career_steals }} steals."
            </p>
            @endif
        </div>

        <div class="grid grid-cols-3 gap-4 text-white">
            @foreach ($posts as $post)
            @foreach ($post->tags as $tag)
            @if ($tag->name === $player->name)
            <div>
                <div
                    class="text-white text-lg font-semibold text-center bg-gray-800 p-4 rounded-lg shadow-lg max-w-md mx-auto">
                    <h2> posted on - {{$post->created_at->format('m-d H:i')}} </h2>
                    <h2> {{ $post->caption }} </h2>
                </div>
                <img src="{{ asset('/storage/' . $post->image_name) }}" />
                <div class="flex flex-col sm:justify-center items-center pt-6 sm:pt-0">
                    <livewire-create-comment :post="$post" />
                </div>
            </div>

            @endif
            @endforeach
            @endforeach
        </div>
    </x-slot>
</x-app-layout>