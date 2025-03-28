<div class="mt-1">
    <!-- Caption -->
    <div class="mt-4">
        <input wire:model="caption" name="caption" class="block mt-1 w-full" type="text" value="{{ old('content') }}" />
        
        <x-input-error :messages="$errors->get('caption')" class="mt-2" />
    </div>

    <!-- Image -->
    <div class="mt-4 text-white">
        <input wire:model="image" name="image" class="block mt-1 w-full" type="file" />

        <x-input-error :messages="$errors->get('image')" class="mt-2" />
    </div>

    <!-- Create Post Button-->
    <div
        class="flex items-center justify-center text-white py-2 rounded-lg">
        <button wire:click="create_post" type="submit"> <b><u>Post</u></b> </button>
    </div>

    <ul>
        <div>
            @foreach ($this->posts() as $post)
            <li style="list-style: none;">
                <div class="text-lg font-semibold text-white">

                    <div
                        class="text-white text-lg font-semibold text-center bg-gray-800 p-4 rounded-lg shadow-lg max-w-md mx-auto">
                        <a href="{{ route('posts.show', $post->user) }}">
                            <h1> <u>{{ $post->user->email }}</u> </h1> posted on -
                            {{$post->created_at->format('m-d H:i')}}
                        </a>
                        <h2> {{ $post->caption }} </h2>
                    </div>
                    <div class="flex justify-center items-center space-x-4 p-4">
                        <img src="{{ asset('/storage/' . $post->image_name) }}" />
                    </div>
                    <div class="text-white p-4 rounded-lg shadow-lg max-w-2xl mx-auto">
                        <livewire-create-comment :post="$post" />
                    </div>
            </li>
            @endforeach
        </div>
        {{$this->posts()->links();}}
    </ul>
</div>