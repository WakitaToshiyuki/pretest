<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
// 仮↓
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
        $param=[
            'name'=>'テスト',
            'email'=>'pretest@gmail.com',
            'password'=>Hash::make('pretest1'),
        ];
        DB::table('users')->insert($param);
    }
}
