<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            RoleSeeder::class
        ]);
        
        // User::factory(10)->create();

        User::factory()->create([
            'role_id' => 1,
            'name' => 'Imagodeo Bideyesa',
            'email' => 'bideyesa@gmail.com',
            'password' => Hash::make('magox1905'),
        ]);
        
        User::factory()->create([
            'role_id' => 1,
            'name' => 'Felix Mario',
            'email' => 'felix@gmail.com',
            'password' => Hash::make('12345678'),
        ]);
    }
}
