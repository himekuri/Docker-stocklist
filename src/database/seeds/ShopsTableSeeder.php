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
        //サンプルデータを作成
        $user = DB::table('users')->first();
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
