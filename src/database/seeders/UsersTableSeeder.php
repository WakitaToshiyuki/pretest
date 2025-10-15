<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
            'password'=>'pretest1',
        ];
        DB::table('users')->insert($param);
    }
}
