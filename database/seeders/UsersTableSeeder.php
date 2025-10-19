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
                'over_name' => '鈴木',
                'under_name' => '一郎',
                'over_name_kana' => 'スズキ',
                'under_name_kana' => 'イチロウ',
                'mail_address' => 'Atlas111@atlas.com',
                'sex' => '1',
                'birth_day' => '20010101',
                'role' => '1',
                'password' => Hash::make('Atlas111'),
            ],
            [
                'over_name' => '田中',
                'under_name' => '二那',
                'over_name_kana' => 'タナカ',
                'under_name_kana' => 'ニイナ',
                'mail_address' => 'Atlas222@atlas.com',
                'sex' => '2',
                'birth_day' => '20020101',
                'role' => '2',
                'password' => Hash::make('Atlas222'),
            ],
            [
                'over_name' => '高橋',
                'under_name' => '三矢',
                'over_name_kana' => 'タカハシ',
                'under_name_kana' => 'ミツヤ',
                'mail_address' => 'Atlas333@atlas.com',
                'sex' => '1',
                'birth_day' => '20030101',
                'role' => '3',
                'password' => Hash::make('Atlas333'),
            ],
            [
                'over_name' => '吉田',
                'under_name' => '四葉',
                'over_name_kana' => 'ヨシダ',
                'under_name_kana' => 'ヨツハ',
                'mail_address' => 'Atlas444@atlas.com',
                'sex' => '2',
                'birth_day' => '20040101',
                'role' => '4',
                'password' => Hash::make('Atlas444'),
            ],
        ]);
    }
}
