<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $user = [
            [
                'name' => 'Kasir',
                'username' => 'kasir',
                'email' => 'kasir@example.com',
                'password' => Hash::make('kasir'),
                'level' => 'kasir',
            ],
            [
                'name' => 'Admin',
                'username' => 'admin',
                'email' => 'admin@example.com',
                'password' => Hash::make('admin'),
                'level' => 'admin',
            ],
            
        ];

        foreach ($user as $idx => $data){
            User::factory()->create($data);
        }
    }
}
