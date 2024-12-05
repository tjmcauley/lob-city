<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;

class CreatePost extends Component
{
    use WithFileUploads;

    public $image;
    public $caption;

    public function create_post()
    {
        $file_path = '';
        if ($this->image) {
            $file_path = $this->image->store('images');
            $p = new Post;
            $p->user_id = Auth::id();;
            $p->image_name = $file_path;
            $p->caption = $this->caption;
            $p->likes = 0;
            $p->save();
        }
    }

    public function posts()
    {
        return Post::all();
    }

    public function render()
    {
        return view('livewire.create-post');
    }
}
