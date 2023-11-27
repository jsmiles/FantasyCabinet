<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
         // Seed users table
        \DB::table('politicians')->insert([
            [
                'name' => 'Liz Truss',
                'role' => 'prime_minister',
                'img_url' => 'https://assets.publishing.service.gov.uk/government/uploads/system/uploads/person/image/351/PM_gov.uk_profile_.jpg',
                'role_started' => '2022-09-06',
                'role_ended' => '2022-10-25',
            ],
            [
                'name' => 'Boris Johnson',
                'role' => 'prime_minister',
                'img_url' => 'https://assets.publishing.service.gov.uk/government/uploads/system/uploads/person/image/2792/Boris_Johnson_.jpg',
                'role_started' => '2019-07-24',
                'role_ended' => '2022-09-06',
            ],
        ]);
    }
}
