<div class="mt-1">
    <div class="py-12">
        <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
            @if($this->comments()->count()==0)
            <div class="text-white">
                No comments on this post yet
            </div>
            @else
            @foreach ($this->comments() as $comment)
            <h2>{{ $comment->content }}</h2>
            @endforeach
            @endif
        </div>

        <div class="p-6 text-gray-900 dark:text-gray-100 ">
            <!-- Comment content -->
            <div class="mt-4">
                <input wire:model="content" name="content" class="text-black block mt-1 w-full" type="text"
                    value="{{ old('content') }}" />

                <x-input-error :messages="$errors->get('content')" class="mt-2" />
            </div>

            <!-- Post comment button-->
            <div class="flex items-center justify-end mt-4">
                <button class="ms-3" wire:click="post_comments" type="submit">Comment</button>
            </div>
        </div>
    </div>
</div>