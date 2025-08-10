<?php

namespace Database\Seeders;

use App\Models\Show;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ShowSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Show::create([
            'name' => 'show 1',
            'details' => 'show description 1',
            'duration_minutes' => 25,
        ]);
    }
}
