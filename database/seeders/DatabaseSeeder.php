<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(mainSectionSeeder::class);
        $this->call(ServiceSeeder::class);
        $this->call(portfullioSeeder::class);
        $this->call(aboutSeeder::class);
        $this->call(teamSeeder::class);
        $this->call(userSeeder::class);
    }
}
