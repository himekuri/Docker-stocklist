<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ShopsTableSeeder extends Seeder
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
            DB::table('shops')->insert([
            'name' => 'スーパー',
            'number' => '1',
            'user_id' => $user->id,
            'gmap_url' => 'https://goo.gl/maps/6zQzbFrZh3CvoE5Z7',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            ]);
        }

    }
}
