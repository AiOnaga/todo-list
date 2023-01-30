<?php

namespace Database\Seeders;

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
        $params = [
            [
                'id' => 1,
                'slam_dunk_high_school_id' => 1,
                'name' => '赤木剛憲',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 2,
                'slam_dunk_high_school_id' => 1,
                'name' => '木暮公延',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 3,
                'slam_dunk_high_school_id' => 1,
                'name' => '宮城リョータ',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 4,
                'slam_dunk_high_school_id' => 1,
                'name' => '桜木花道',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 5,
                'slam_dunk_high_school_id' => 1,
                'name' => '流川楓',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 6,
                'slam_dunk_high_school_id' => 1,
                'name' => '三井寿',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 7,
                'slam_dunk_high_school_id' => 2,
                'name' => '魚住純',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 8,
                'slam_dunk_high_school_id' => 2,
                'name' => '池上亮二',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 9,
                'slam_dunk_high_school_id' => 2,
                'name' => '越野宏明',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 10,
                'slam_dunk_high_school_id' => 2,
                'name' => '仙道彰',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 11,
                'slam_dunk_high_school_id' => 2,
                'name' => '植草智之',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 12,
                'slam_dunk_high_school_id' => 3,
                'name' => '牧紳一',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 13,
                'slam_dunk_high_school_id' => 3,
                'name' => '高砂一馬',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 14,
                'slam_dunk_high_school_id' => 3,
                'name' => '神宗一郎',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 15,
                'slam_dunk_high_school_id' => 3,
                'name' => '武藤正',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 16,
                'slam_dunk_high_school_id' => 3,
                'name' => '清田信長',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 17,
                'slam_dunk_high_school_id' => 4,
                'name' => '藤真健司',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 18,
                'slam_dunk_high_school_id' => 4,
                'name' => '花形透',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 19,
                'slam_dunk_high_school_id' => 4,
                'name' => '長谷川一志',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 20,
                'slam_dunk_high_school_id' => 4,
                'name' => '永野満',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 21,
                'slam_dunk_high_school_id' => 4,
                'name' => '高野昭一',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];

        foreach ($params as $param) {
            DB::table('slam_dunk_characters')->insert($param);
        }
    }
}
