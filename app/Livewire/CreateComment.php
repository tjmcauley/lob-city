<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Rule;

class CreateComment extends Component
{

    public $post_id;

    #[Rule('required|min:1|max:200')]
    public $content;

    public function post_comments()
    {
        $this->validate();

        $c = new Comment;
        $c->user_id = Auth::id();
        $c->post_id = $this->post_id;
        $c->content = $this->content;
        $c->save();
    }

    public function comments()
    {
        return Comment::all();
    }

    public function posts()
    {
        return Post::all();
    }

    public function mount($post)
    {
        $this->post_id = $post->id;
    }

    public function render()
    {
        return view('livewire.create-comment');
    }
}
