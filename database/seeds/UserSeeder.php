<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'email' => 'admin@laravel.local',
            'name' => 'admin',
            'password' => Hash::make('admin'),
            'phone' => '+7 888 999-99-99']);
    }

}
