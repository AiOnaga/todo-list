<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
  public function index()
  {
    // ログインユーザー取得
    $user = Auth::user();

    // 全ユーザーと各ユーザーに紐づくタスクをリレーションで取得
    // $user = User::with('tasks')->get();
    $user = User::with(['tasks' => function ($query) {
      $query->whereNotNull('done_at');
  }])->get();

    // dd($user);
    // dd($tasks[0]->user->name);

    // 一旦ここでddしてみる

    $viewData = [
      'User1' => [
        'id' => 1,
        'name' => 'ai',
        'tasks' =>[
          [
            'task_name' => 'あああ',
            'content' => 'ああああああああああ'
          ],
          [
            'task_name' => 'あああ',
            'content' => 'ああああああああああ'
          ],
          [
            'task_name' => 'あああ',
            'content' => 'ああああああああああ'
          ],
        ]
      ],
      'User2' => [
        'id' => 2,
        'name' => 'ai',
        'tasks' =>[
          [
            'task_name' => 'あああ',
            'content' => 'ああああああああああ'
          ],
          [
            'task_name' => 'あああ',
            'content' => 'ああああああああああ'
          ],
          [
            'task_name' => 'あああ',
            'content' => 'ああああああああああ'
          ],
        ]
      ],
      'User3' => [
        'id' => 3,
        'name' => 'ai',
        'tasks' =>[
          [
            'task_name' => 'あああ',
            'content' => 'ああああああああああ'
          ],
          [
            'task_name' => 'あああ',
            'content' => 'ああああああああああ'
          ],
          [
            'task_name' => 'あああ',
            'content' => 'ああああああああああ'
          ],
        ]
      ],
    ];

    // return view('dashboard');
    return view('dashboard')->with(['users' => $user]);
  }
}



// $request->input('comment-' . $taskId);