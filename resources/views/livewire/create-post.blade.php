<div>
    <!-- Caption -->
    <div class="mt-4">
        <input wire:model="caption" name="caption" class="block mt-1 w-full" type="text" value="{{ old('content') }}" />
    </div>

    <!-- Image -->
    <div class="mt-4 text-white">
        <input wire:model="image" name="image" class="block mt-1 w-full" type="file" />
    </div>

    <!-- Create Post Button-->
    <div
        class="flex items-center justify-end mt-4 bg-black text-white py-2 px-4 rounded-lg hover:bg-gray-800 focus:outline-none">
        <button class="" wire:click="create_post" type="submit">Post</budivn>
    </div>

    <ul>
        @foreach ($this->posts() as $post)
        <li style="list-style: none;">
            <div class="text-lg font-semibold text-white">
                <a href="{{ route('posts.show', $post->user) }}">
                    <h1> {{ $post->user->email }} </h1>
                </a>
            </div>
            <div
                class="text-white text-lg font-semibold text-center bg-gray-800 p-4 rounded-lg shadow-lg max-w-md mx-auto">
                <h2> {{ $post->caption }} </h2>
            </div>
            <div class="flex justify-center items-center space-x-4 p-4">
                <img src="{{ asset('/storage/' . $post->image_name) }}" />
            </div>
            <div class="text-white p-4 rounded-lg shadow-lg max-w-2xl mx-auto">
                @foreach ($post->comments as $comment)
                <h2>"{{ $comment->content }}"</h2>
                @endforeach
            </div>
        </li>
        <div class="flex justify-center items-center space-x-4 p-4">
            <livewire-create-comment :post="$post" />
        </div>
        @endforeach
    </ul>
</div>