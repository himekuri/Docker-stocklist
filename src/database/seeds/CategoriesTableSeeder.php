<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //全ユーザーに対してサンプルデータを作成
        $users = DB::table('users')->get();
        foreach( $users as $user){
            DB::table('categories')->insert([
                ['name' => '野菜',
                'number' => '1',
                'user_id' => $user->id,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                ],
                ['name' => 'ドリンク',
                'number' => '2',
                'user_id' => $user->id,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                ],
                ['name' => '備品',
                'number' => '3',
                'user_id' => $user->id,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                ],
            ]);
        }
    }
}