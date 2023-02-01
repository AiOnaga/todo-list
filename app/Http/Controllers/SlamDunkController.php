<?php

namespace App\Http\Controllers;

use App\Models\SlamDunkCharacter;
use App\Models\SlamDunkHighSchool;

class SlamDunkController extends Controller
{
    public function index()
    {
        //リレーションを使ってデータを取得する
        $schools = SlamDunkHighSchool::with('characters')->get();
        // dd($schools->pluck('characters')->flatten()->filter(function ($value, $key) {
        //     return $value->slam_dunk_high_school_id != 1;
        // })->pluck('name'));
        $characters = SlamDunkCharacter::with('highSchool')->get();
        dd($characters);

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
