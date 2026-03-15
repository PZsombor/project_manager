<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'juanito',
            'email' => 'juanito@idk.huh',
            'password' => 'juanito',
            'is_admin' => 1,
        ]);

        User::factory()->create([
            'name' => 'npc',
            'email' => 'npc@idk.huh',
            'password' => 'npc',
            'is_admin' => 0,
        ]);
    }
}
