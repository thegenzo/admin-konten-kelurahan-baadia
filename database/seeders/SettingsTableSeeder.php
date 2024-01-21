<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("settings")->insert(
            ['name' => 'Running Text', 'content' => 'Selamat Datang di Admin Kelurahan Baadia'],
        );

        DB::table("settings")->insert(
            ['name' => 'Visi dan Misi', 'content' => 'Visi dan Misi'],
        );
    }
}
