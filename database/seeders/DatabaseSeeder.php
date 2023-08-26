<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Constants\Enum;
use App\Models\Brand;
use App\Models\Collection;
use App\Models\Constant;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\ProductVariants;
use App\Models\Setting;
use App\Models\User;
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

        //customer faker
//        User::factory(10)->create();




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



//        Brand::query()->insert($brands);
//        Collection::query()->insert($collections);
//        Product::factory()->count(5)->create();
//        Order::factory()->count(10)->create();

//        foreach (Product::query()->get() as $product){
//            ProductImage::query()->create([
//               'name' => 'default.png',
//               'product_id' => $product->id,
//            ]);
//        }
//        $colors = ['red','black','white','yellow'];
//        foreach (Product::query()->get() as $product){
//            for($i=1;$i<=3;$i++){
//                ProductVariants::query()->create([
//                    'color' => $colors[array_rand($colors)],
//                    'price' => rand(10,100),
//                    'stoke' => rand(100,1000),
//                    'image' => 'default.png',
//                    'product_id' => $product->id,
//                ]);
//            }
//
//        }


//        foreach (Order::query()->get() as $order){
//            foreach(Product::query()->get() as $product){
//                $colors  = $product->variations->pluck('color')->toArray();
//                $randomColor  =$colors[array_rand($colors, 1)];
//                OrderItem::query()->create([
//                    'color' => $randomColor,
//                    'price' => rand(10,100),
//                    'qty' => rand(1,3),
//                    'image' => 'default.png',
//                    'product_id' => $product->id,
//                    'order_id' => $order->id,
//                ]);
//            }
//
//        }

    }
}
