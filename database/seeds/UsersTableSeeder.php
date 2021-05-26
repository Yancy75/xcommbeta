<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class)->create([
            'name'     => 'Admin Xcomm',
            'name' => 'admin',
            'email'    => 'jet_thunder@hotmail.com',
            'password' => bcrypt('123456'),
            'level'    => 'admin',
            'status'   => '1',
        ]);
    }
}
