<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use App\Models\Comment;
use App\Models\User;
use Livewire\Attributes\Rule;


class CreatePost extends Component
{
    use WithFileUploads;

    #[Rule('required')]
    public $image;

    #[Rule('required|min:1|max:255')]
    public $caption;

    public function create_post()
    {

        # Validate post
        $this->validate();

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

        $this->reset(['image', 'caption']);
    }

    public function posts()
    {
        return Post::orderBy('updated_at', 'desc')->paginate(3);
    }

    public function comments()
    {
        return Comment::all();
    }

    public function users() 
    {
        return User::all();    
    }

    public function render()
    {
        return view('livewire.create-post');
    }
}