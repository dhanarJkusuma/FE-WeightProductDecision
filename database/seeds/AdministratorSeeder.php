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
            'username' => 'admin',
            'password' => bcrypt('admin'),
            'level' => 'admin'
        ]);
    }
}
