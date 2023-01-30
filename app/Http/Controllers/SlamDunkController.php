<?php

namespace App\Http\Controllers;

use App\Models\SlamDunkCharacter;
use App\Models\SlamDunkHighSchool;

class SlamDunkController extends Controller
{
    public function index()
    {
        $schools = SlamDunkHighSchool::all();
        $characters = SlamDunkCharacter::all();

        return view('slam_dunk.index', compact('schools', 'characters'));
    }
}
