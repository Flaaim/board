<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class PermSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permissions')->insert([
            ['title' => 'Full Access', 'alias'=> 'FULL_ACCESS'],
            ['title' => 'User Access', 'alias'=> 'USER_ACCESS'],
            ['title' => 'User Edit', 'alias'=> 'USER_EDIT'],
            ['title' => 'Roles show', 'alias'=> 'ROLES_SHOW'],
            ['title' => 'Roles edit', 'alias'=> 'ROLES_EDIT'],
        ]);
    }
}
