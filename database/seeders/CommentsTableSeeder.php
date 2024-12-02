<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Comment;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $c1 = new Comment;
        $c1->user_id = 3;
        $c1->post_id = 1;
        $c1->content = "Iconic duo";
        $c1->save();

        $c2 = new Comment;
        $c2->user_id = 3;
        $c2->post_id = 1;
        $c2->content = "Hoopla";
        $c2->save();
    }
}
