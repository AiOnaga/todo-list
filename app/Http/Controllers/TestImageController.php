<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestImageController extends Controller
{
  public function index()
  {
    return view('test.image');
  }

  public function upload(Request $request)
  {
      // ディレクトリ名
      $dir = 'sample';

      // sampleディレクトリに画像を保存
      $file_name = $request->file('image')->getClientOriginalName();

      // 取得したファイル名で保存
      $request->file('image')->storeAs('public/' . $dir, $file_name);

      return redirect('/test/image');
  }

}