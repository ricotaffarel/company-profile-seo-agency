<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        // User::create([
        //     "name" => "Rico Taffarel Andi",
        //     "email" => "rico@gmail.com",
        //     "password" => Hash::make("password123"),
        // ]);
        // \App\Models\Menu::factory(7)->create();
        // \App\Models\Profile::factory(1)->create();
        \App\Models\About::factory(1)->create();
    }
}
