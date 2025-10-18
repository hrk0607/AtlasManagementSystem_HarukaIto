<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
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
                'name' => 'Atlas一郎',
                'email' => 'Atlas111@atlas.com',
                'password' => Hash::make('Atlas111'),
            ],
            [
                'name' => 'Atlas二葉',
                'email' => 'Atlas222@atlas.com',
                'password' => Hash::make('Atlas222'),
            ],
            [
                'name' => 'Atlas三矢',
                'email' => 'Atlas333@atlas.com',
                'password' => Hash::make('Atlas333'),
            ],
        ]);
    }
}
