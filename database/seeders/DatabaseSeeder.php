<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
        // Other seeders can be called here as well
        $this->call([
            // Add your other seeders here
            ArtworkSeeder::class,
        ]);
    }
}
