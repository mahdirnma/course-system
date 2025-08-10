<?php

namespace Database\Seeders;

use App\Models\Event;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Event::create([
            'title' => 'event1',
            'description' => 'event description 1',
            'owner' => 'owner 1',
            'date' => '2019-01-10',
        ]);
        Event::create([
            'title' => 'event2',
            'description' => 'event description 2',
            'owner' => 'owner 2',
            'date' => '2024-01-10',
        ]);
    }
}
