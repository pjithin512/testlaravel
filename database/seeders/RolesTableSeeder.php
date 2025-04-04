<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //<?php
        // Insert roles into the database
        DB::table('roles')->insert([
            ['role_name' => 'Admin'],
            ['role_name' => 'Editor'],
            ['role_name' => 'User'],
        ]);
    }
}
