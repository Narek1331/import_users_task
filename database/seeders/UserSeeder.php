<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::insert([
            [
            'first_name' => 'hello',
            'last_name' => 'word',
            'email' => 'test@gmail.com',
            'age' => 13
            ],
            [
            'first_name' => 'hello2',
            'last_name' => 'word2',
            'email' => 'test2@gmail.com',
            'age' => 13
            ],
            [
            'first_name' => 'hello3',
            'last_name' => 'word3',
            'email' => 'test3@gmail.com',
            'age' => 13
            ],
            [
            'first_name' => 'hello4',
            'last_name' => 'word4',
            'email' => 'test4@gmail.com',
            'age' => 13
            ],
            [
            'first_name' => 'hello5',
            'last_name' => 'word5',
            'email' => 'test5@gmail.com',
            'age' => 13
            ],
    ]);
    }
}
