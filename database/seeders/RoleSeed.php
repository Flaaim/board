<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class RoleSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            ['title'=>'Admin', 'alias'=>'ADMIN'],
            ['title'=> 'Moderator', 'alias'=>'MODERATOR'],
            ['title'=> 'User', 'alias'=>'USER'],
            ['title'=> 'Aderter', 'alias'=>'ADVERTER'],
        ]);
    }
}
