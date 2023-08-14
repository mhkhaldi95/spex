<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Constants\Enum;
use App\Models\Constant;
use App\Models\Setting;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $user = \App\Models\User::factory()->create([
            'name' => 'spex',
            'email' => 'spex@gmail.com',
            'username' => 'spex',
            'role' => Enum::SUPER_ADMIN,
            'password' => Hash::make('123456'),
        ]);


        $data = [
            ["key" => 'site_name', "value_ar" => 'spex', "value_en" => 'spex'],
            ["key" => 'site_description', "value_ar" => 'spex', "value_en" => 'spex'],
            ["key" => 'site_icon', "value_ar" => '', "value_en" => 'icon_site.png'],
            ["key" => 'tags', "value_ar" => '', "value_en" => ''],



        ];

        foreach ($data as $row) {
            Setting::query()->create($row);
        }
    }
}
