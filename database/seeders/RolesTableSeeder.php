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
        DB::table('roles')->insert([
            ['name' => 'super_admin'],
            ['name' => 'admin'],
            ['name' => 'admin_keuangan'],
            ['name' => 'admin_pepustakaan'],
            ['name' => 'kaprog'],
            ['name' => 'pemray'],
            ['name' => 'user'],
        ]);
    }
}
