<?php

namespace App\Http\Controllers;

use App\Models\SlamDunkCharacter;
use App\Models\SlamDunkHighSchool;
use App\Models\SlamDunkPosition;

class SlamDunkController extends Controller
{
    public function index()
    {
        // $collection = collect([
        //     'センター' => 3,
        //     'ポイントガード' => 4,
        //     'シューティングガード' => 2,
        //     'スモールフォワード' => 5,
        //     'パワーフォワード' => 1,
        // ]);
        // dd($collection->);

        //リレーションを使ってデータを取得する
        $schools = SlamDunkHighSchool::with('characters.position')->get();
        // dd($schools->pluck('characters')->flatten()->pluck('position')->pluck('name')->unique());
        $arr = $schools->pluck('characters')->flatten()->pluck('slam_dunk_position_id')->countBy()->toArray();
        $ids = array_keys($arr, max($arr));
        $result = SlamDunkPosition::whereIn('id', $ids)->get()->pluck('name');

        // dd($result);
        // slam_dunk_positionsテーブルから$idsに合致するものを取得する

        // dd($schools->pluck('characters')->flatten()->filter(function ($value, $key) {
        //     return $value->slam_dunk_high_school_id != 1;
        // })->pluck('name'));
        $characters = SlamDunkCharacter::with(['highSchool', 'position'])->get();
        // dd($character->position->name);

        // $positions = SlamDunkPosition::whereHas('characters', function($query) use ($slam_dunk_position_id){
        //     $query->where('slam_dunk_position_id', $slam_dunk_position_id);
        // })->get();

        $positions = SlamDunkPosition::with('characters.highSchool')->get();
        // dd(SlamDunkPosition::with(['characters', 'characters.highSchool'])->toSql());
        // dd($positions->first()->characters->pluck('highSchool')->pluck('name'));
        

        return view('slam_dunk.index', compact('schools', 'characters'));
    }

    public function show($slam_dunk_high_school_id)
    {
        // $slam_dunk_high_school_id は slam_dunk_high_schools.idと一致させないといけない

        // $schools = SlamDunkHighSchool::with(['characters' => function($query) use ($slam_dunk_high_school_id) {

        //     // slam_dunk_high_characters.id = $slam_dunk_high_school_id
        //     // 例) slam_dunk_high_characters.id = 1 (←は 赤木剛憲)
        //     $query->where('id', $slam_dunk_high_school_id);
        // }])->get();

        // Eloquentメソッドを使う時は 「->メソッド()」 で繋げるとちゃんと動くよー
        // $school = SlamDunkHighSchool::where('id', $slam_dunk_high_school_id)->with(['characters'])->get();
        $school = SlamDunkHighSchool::with(['characters'])->where('id', $slam_dunk_high_school_id)->first();

        // get()はarrayが返ってくるので一覧取得の時
        // first()はModelが帰ってくるので一件取得の時
        // dd($schools->characters);

        $characters = $school->characters;

        return view('slam_dunk.show', compact('school', 'characters'));
    }
}
