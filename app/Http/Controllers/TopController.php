<?php

namespace App\Http\Controllers;

class TopController extends Controller
{
  public function index()
  {
    // return 'Hello, World!!';
    return view('welcome');
  }
}