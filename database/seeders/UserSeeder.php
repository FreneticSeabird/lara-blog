<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'admin',
                'email' => 'admin@larablog.dev',
                'password' => bcrypt('adminadmin'),
                'created_at' => now()
            ],
            [
                'name' => 'test',
                'email' => 'test@larablog.dev',
                'password' => bcrypt('testtest'),
                'created_at' => now()
            ]
        ]);
        
        // Création de 50 utilisateurs fictifs
        User::factory()->count(50)->create();
    }
}
