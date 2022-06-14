<?php

namespace Database\Seeders;

use App\Models\Thought;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $user1 = User::create([
            'name' => 'Nakuru Wubni',
            'email' => 'nwubni@gmail.com',
            'username' => 'nwubni',
            'password' => Hash::make('password'),
        ]);

        $user2 = User::create([
            'name' => 'Angeli',
            'email' => 'angeli@gmail.com',
            'username' => 'angeli',
            'password' => Hash::make('password'),
        ]);

        Thought::create([
            'user_id' => $user1->id,
            'message' => 'I am feeling pumbed.'
        ]);

        Thought::create([
            'user_id' => $user2->id,
            'message' => 'We need to try something different today.'
        ]);
    }
}
