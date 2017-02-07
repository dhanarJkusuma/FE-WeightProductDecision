<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class AdministratorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'nama' => 'Administrator',
            'username' => '4dmin761',
            'password' => bcrypt('admin'),
            'level' => 'admin'
        ]);
    }
}
