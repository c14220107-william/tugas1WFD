<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class EventsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        for ($i = 0; $i < 6; $i++){
            DB::table('events')->insert([
                'title' => fake()->jobTitle(3),
                'venue' => fake()->address(),
                'date' => fake()->date(),
                'start_time' => fake()->time('H:i'),
                'description' => fake()->paragraph(),
                'booking_url' => fake()->url(),
                'tags' => implode(',', fake()->words(3)),
                'organizers_id' => rand(1, 5), 
                'event_category_id' => rand(1, 3), 
                'active' => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
    
            ]);

        }
        
    }
}
