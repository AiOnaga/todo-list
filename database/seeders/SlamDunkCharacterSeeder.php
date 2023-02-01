<?php

namespace Database\Seeders;

use App\Models\SlamDunkCharacter;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SlamDunkCharacterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 方法1：deleteで削除
        // DB::table('slam_dunk_characters')->delete();

        // 方法2：トランケートで削除
        DB::table('slam_dunk_characters')->truncate();

        // ポジションのデータを全取得した後、idだけを抽出
        // $positionIds = SlamDunkPosition::all()->pluck('id');
        
        // 最初のid(最小値)と最後のid(最大値)の中でランダムに一つ取得する
        // mt_rand($positionIds->first(), $positionIds->last())

        $params = [
            [
                'id' => 1,
                'slam_dunk_high_school_id' => 1,
                'name' => '赤木剛憲',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'slam_dunk_position_id' => mt_rand(1, 5),
            ],
            [
                'id' => 2,
                'slam_dunk_high_school_id' => 1,
                'name' => '木暮公延',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'slam_dunk_position_id' =>  mt_rand(1, 5),
            ],
            [
                'id' => 3,
                'slam_dunk_high_school_id' => 1,
                'name' => '宮城リョータ',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'slam_dunk_position_id' =>  mt_rand(1, 5),
            ],
            [
                'id' => 4,
                'slam_dunk_high_school_id' => 1,
                'name' => '桜木花道',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'slam_dunk_position_id' =>  mt_rand(1, 5),
            ],
            [
                'id' => 5,
                'slam_dunk_high_school_id' => 1,
                'name' => '流川楓',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'slam_dunk_position_id' =>  mt_rand(1, 5),
            ],
            [
                'id' => 6,
                'slam_dunk_high_school_id' => 1,
                'name' => '三井寿',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'slam_dunk_position_id' =>  mt_rand(1, 5),
            ],
            [
                'id' => 7,
                'slam_dunk_high_school_id' => 2,
                'name' => '魚住純',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'slam_dunk_position_id' =>  mt_rand(1, 5),
            ],
            [
                'id' => 8,
                'slam_dunk_high_school_id' => 2,
                'name' => '池上亮二',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'slam_dunk_position_id' =>  mt_rand(1, 5),
            ],
            [
                'id' => 9,
                'slam_dunk_high_school_id' => 2,
                'name' => '越野宏明',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'slam_dunk_position_id' =>  mt_rand(1, 5),
            ],
            [
                'id' => 10,
                'slam_dunk_high_school_id' => 2,
                'name' => '仙道彰',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'slam_dunk_position_id' =>  mt_rand(1, 5),
            ],
            [
                'id' => 11,
                'slam_dunk_high_school_id' => 2,
                'name' => '植草智之',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'slam_dunk_position_id' =>  mt_rand(1, 5),
            ],
            [
                'id' => 12,
                'slam_dunk_high_school_id' => 3,
                'name' => '牧紳一',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'slam_dunk_position_id' =>  mt_rand(1, 5),
            ],
            [
                'id' => 13,
                'slam_dunk_high_school_id' => 3,
                'name' => '高砂一馬',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'slam_dunk_position_id' =>  mt_rand(1, 5),
            ],
            [
                'id' => 14,
                'slam_dunk_high_school_id' => 3,
                'name' => '神宗一郎',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'slam_dunk_position_id' =>  mt_rand(1, 5),
            ],
            [
                'id' => 15,
                'slam_dunk_high_school_id' => 3,
                'name' => '武藤正',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'slam_dunk_position_id' =>  mt_rand(1, 5),
            ],
            [
                'id' => 16,
                'slam_dunk_high_school_id' => 3,
                'name' => '清田信長',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'slam_dunk_position_id' =>  mt_rand(1, 5),
            ],
            [
                'id' => 17,
                'slam_dunk_high_school_id' => 4,
                'name' => '藤真健司',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'slam_dunk_position_id' =>  mt_rand(1, 5),
            ],
            [
                'id' => 18,
                'slam_dunk_high_school_id' => 4,
                'name' => '花形透',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'slam_dunk_position_id' =>  mt_rand(1, 5),
            ],
            [
                'id' => 19,
                'slam_dunk_high_school_id' => 4,
                'name' => '長谷川一志',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'slam_dunk_position_id' =>  mt_rand(1, 5),
            ],
            [
                'id' => 20,
                'slam_dunk_high_school_id' => 4,
                'name' => '永野満',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'slam_dunk_position_id' =>  mt_rand(1, 5),
            ],
            [
                'id' => 21,
                'slam_dunk_high_school_id' => 4,
                'name' => '高野昭一',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'slam_dunk_position_id' =>  mt_rand(1, 5),
            ],
        ];

        foreach ($params as $param) {
            DB::table('slam_dunk_characters')->insert($param);
        }
    }
}
