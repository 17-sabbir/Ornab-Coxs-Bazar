<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Centralized website settings row (branding, contacts, statistics)
        $this->call(ApplicationsTableSeeder::class);

        // Create admin user
        \App\Models\User::create([
            'name' => 'Admin',
            'email' => 'ornob@gmail.com',
            'password' => bcrypt('admin123'),
            'email_verified_at' => now(),
        ]);
    }
}
