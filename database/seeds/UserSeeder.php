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
            'email' => 'admin@admin.pt',
            'name'  => 'admin',
            'password'  => bcrypt('admin'),
            'is_admin' => 1,
        ]);
    }
}
