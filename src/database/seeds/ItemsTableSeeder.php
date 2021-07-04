<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = DB::table('users')->first();
        $shop = DB::table('shops')->first();
        $category = DB::table('categories')->first();
        DB::table('items')->insert([
        'name' => 'トマト',
        'user_id' => $user->id,
        'image_url' => 'https://res.cloudinary.com/stocklist/image/upload/c_fit,h_100,w_100/v1625398996/tomato_red_tius7t.png',
        'shop_id' => $shop->id,
        'category_id' => $category->id,
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now(),
        ]);
    }
}