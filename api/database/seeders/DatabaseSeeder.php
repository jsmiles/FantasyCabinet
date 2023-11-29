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
                'img_url' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/7/79/Official_portrait_of_Liz_Truss_%28cropped%29.jpg/423px-Official_portrait_of_Liz_Truss_%28cropped%29.jpg',
                'role_started' => '2022-09-06',
                'role_ended' => '2022-10-25',
                'county_of_birth' => 'Oxfordshire',
                'undergraduate_university' => 'Oxford',
                'constituency' => 'South West Norfolk'
            ],
            [
                'name' => 'Boris Johnson',
                'role' => 'prime_minister',
                'img_url' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/7/76/Boris_Johnson_official_portrait_%28cropped%29.jpg/426px-Boris_Johnson_official_portrait_%28cropped%29.jpg',
                'role_started' => '2019-07-24',
                'role_ended' => '2022-09-06',
                'county_of_birth' => 'Abroad',
                'undergraduate_university' => 'Oxford',
                'constituency' => 'Uxbridge and South Ruislip'
            ],
            [
                'name' => 'Rishi Sunak',
                'role' => 'chancellor',
                'img_url' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/a/ab/Portrait_of_Prime_Minister_Rishi_Sunak_%28cropped%29.jpg/800px-Portrait_of_Prime_Minister_Rishi_Sunak_%28cropped%29.jpg',
                'role_started' => '2020-02-13',
                'role_ended' => '2022-07-05',
                'county_of_birth' => 'Hampshire',
                'undergraduate_university' => 'Oxford',
                'constituency' => 'Richmond (Yorks)'
            ],
        ]);
    }
}
