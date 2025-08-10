<?php

namespace Database\Seeders;

use App\Models\Sponsor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SponsorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Sponsor::create([
            'name' => 'sponsor 1',
            'description' => 'sponsor description 1',
            'logo' => 'logo 1',
        ]);
        Sponsor::create([
            'name' => 'sponsor 2',
            'description' => 'sponsor description 2',
            'logo' => 'logo 2',
        ]);

    }
}
