<div>
    <!-- Caption -->
    <div class="mt-4">
        <input wire:model="caption" name="caption" class="block mt-1 w-full" type="text" value="{{ old('content') }}" />
    </div>

    <!-- Image -->
    <div class="mt-4 text-black">
        <input wire:model="image" name="image" class="block mt-1 w-full" type="file" />
    </div>

    <!-- Create Post Button-->
    <div class="flex items-center justify-end mt-4">
        <button class="ms-3" wire:click="create_post" type="submit">Post</button>
    </div>

    <div class="text-white">
        <ul>
            @foreach ($this->posts() as $post)
            <li style="list-style: none;">
                <a href="{{ route('posts.show', $post->user) }}"> <h1> {{ $post->user->email }} </h1> </a>
                <h2> {{ $post->caption }} </h2>
                <img src="{{ asset('/storage/' . $post->image_name) }}" />
                @foreach ($post->comments as $comment)
                <h2>"{{ $comment->content }}"</h2>
                @endforeach
            </li>
            <livewire-create-comment :post="$post" />
            @endforeach
        </ul>
    </div>
</div>