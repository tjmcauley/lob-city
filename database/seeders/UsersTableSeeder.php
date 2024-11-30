<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $hashed_password = Hash::make('admin');
        $u1 = new User;
        $u1->type = 1; // type 1 = admin
        $u1->email = "admin@gmail.com";
        $u1->password = $hashed_password;
        $u1->save();

        $hashed_password = Hash::make('verified');
        $u2 = new User;
        $u2->type = 2; // type 2 = verified
        $u2->email = "verified@gmail.com";
        $u2->password = $hashed_password;
        $u2->save();

        $hashed_password = Hash::make('standard');
        $u3 = new User;
        $u3->type = 3; // type 3 = standard
        $u3->email = "standard@gmail.com";
        $u3->password = $hashed_password;
        $u3->save();

        User::factory()->count(2)->create();
    }
}
