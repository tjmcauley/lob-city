<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Post;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $p1 = new Post;
        $p1->image_name = "images/test_image.jpg";
        $p1->caption = "My favourite dunk";
        $p1->likes = 50;
        $p1->user_id = 3;
        $p1->save();
    }
}
