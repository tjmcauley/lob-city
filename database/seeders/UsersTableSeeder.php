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
        $hashed_password = Hash::make('johnpassword');
        $u1 = new User;
        $u1->email = "test@gmail.com";
        $u1->password = $hashed_password;
        $u1->save();

        User::factory()->count(5)->create();
    }
}
