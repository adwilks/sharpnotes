<?php


use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder {

    public function run() {
        DB::table('users')->delete();
        \App\User::create(array (
            'name'  => 'test',
            'email' =>  'test@test.com',
            'password' =>   Hash::make('$sh4rpspr1nG$')
        ));
    }
}
