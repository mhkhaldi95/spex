<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Constants\Enum;
use App\Models\Brand;
use App\Models\Collection;
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
            ["key" => 'site_name', "value" => 'spex'],
            ["key" => 'site_description', "value_ar" => 'spex'],
            ["key" => 'site_icon', "value" => 'icon_site.png'],
            ["key" => 'site_tags', "value" => ''],

        ];

        $brands = [
            ['name' => 'brand1'],
            ['name' => 'brand2'],
            ['name' => 'brand3'],
        ];
        $collections = [
            ['name' => 'collection1' ,'brand_id'=> rand(1,3)],
            ['name' => 'collection2' ,'brand_id'=> rand(1,3)],
            ['name' => 'collection3' ,'brand_id'=> rand(1,3)],
            ['name' => 'collection4' ,'brand_id'=> rand(1,3)],
            ['name' => 'collection5' ,'brand_id'=> rand(1,3)],
            ['name' => 'collection6' ,'brand_id'=> rand(1,3)],
            ['name' => 'collection7' ,'brand_id'=> rand(1,3)],
            ['name' => 'collection8' ,'brand_id'=> rand(1,3)],
            ['name' => 'collection9' ,'brand_id'=> rand(1,3)],
        ];


        Setting::query()->insert($data);
        Brand::query()->insert($brands);
        Collection::query()->insert($collections);

    }
}
