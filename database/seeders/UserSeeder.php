<?php

namespace Database\Seeders;

use App\Models\User; // Import User model
use Illuminate\Support\Facades\File; // Import File facade
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $json = File::get(path:'database/json/users.json');
        $users = collect(json_decode($json,true));
        $users->each(function ($user) {
            User::create([
                'name' => $user['name'], // Use array indexing
                'email' => $user['email'],
                'age' => $user['age'],
                'city' => $user['city'],
            ]);

        });
    }
}
