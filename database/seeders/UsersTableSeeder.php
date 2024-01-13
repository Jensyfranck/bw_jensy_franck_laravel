<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'Jensy Franck',
            'email' => 'jensyfranck@gmail.com',
            'password' => Hash::make('Student1'),
            'is_admin' => true,

        ]);

        User::factory()->count(10)->create();
    }
}
