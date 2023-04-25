<?php

namespace Database\Seeders;

use DateTime;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'root',
            'email' => 'root@gmail.com',
            'password' => '$2y$10$Bf8SxmyTWMw5ClbWU3TZd.kdSVopiSSHw2vFx/bDsJ326NR3IGgs2',
            'created_at' => new DateTime('now'),
            'updated_at' => new DateTime('now')
        ]);
    }
}
