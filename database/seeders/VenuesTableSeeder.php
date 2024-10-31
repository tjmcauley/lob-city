<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Venue;

class VenuesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $v1 = new Venue;
        $v1->name = "Crypto.com Arena";
        $v1->city_id = 1;
        $v1->save();

        $v2 = new Venue;
        $v2->name = "Intuit Dome";
        $v2->city_id = 1;
        $v2->save();

        Venue::factory()->count(3)->create();
    }
}
