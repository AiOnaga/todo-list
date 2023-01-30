<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
  public function indexs()
  {
    // ログインユーザー取得
    // $user = Auth::user();

    // 全ユーザーと各ユーザーに紐づくタスクをリレーションで取得
    // $user = User::with('tasks')->get();
    $users = User::with(['tasks' => function ($query) {
      $query->whereNotNull('done_at');
  }])->get();

    // dd($tasks[0]->user->name);

    // 一旦ここでddしてみる
    // dd($users);

    // $taskListを初期化
    // $taskList = [];

    foreach ($users as $user) {
      // dd($user->tasks);

      // ただの配列
      $arr = [1, 2, 3, 4, 5];
      // dd($arr);
      // コレクション配列
      $colArr = collect([1, 2, 3, 4, 5]);
      // dd($colArr);

      // パターン2 一旦事前に値（$taskListの連想配列）を作っておいて、後からセットする
      // $taskList = [
      //   [
      //     'task_name' => 'あああ',
      //     'content' => 'ああああああああああ'
      //   ],
      //   [
      //     'task_name' => 'あああ',
      //     'content' => 'ああああああああああ'
      //   ],
      //   [
      //     'task_name' => 'あああ',
      //     'content' => 'ああああああああああ'
      //   ],
      // ];

      foreach ($user->tasks as $task) {
        $taskList[] = [
          'task_name' => $task->task_name,
          'content' => $task->content
        ];
      }

      // dd($taskList);

      $viewData[$user->name] = [
          'id' => $user->id,
          'name' => $user->name,
        //   'tasks' => [
        //     [
        //       'task_name' => 'あああ',
        //       'content' => 'ああああああああああ'
        //     ],
        //     [
        //       'task_name' => 'あああ',
        //       'content' => 'ああああああああああ'
        //     ],
        //     [
        //       'task_name' => 'あああ',
        //       'content' => 'ああああああああああ'
        //     ],
        // ],

        // パターン1 mapメソッドでダイレクトに連想配列を作る
        // 'tasks' => $user->tasks->map(function ($task) {
        //   dd($task);
        //   return $task;
        // }),

        // パターン2 一旦事前に値（$taskListの連想配列）を作っておいて、後からセットする
        'tasks' => $taskList
      ];
      

      // 前ループでセットした値を残さないように、$taskListの中身をリセットする
      $taskList = null;
    }

    
    // dd($viewData);

    // $viewData = [
    //   'User1' => [
    //     // 'id' => $user->,
    //     'name' => 'ai',
    //     'tasks' =>[
    //       [
    //         'task_name' => 'あああ',
    //         'content' => 'ああああああああああ'
    //       ],
    //       [
    //         'task_name' => 'あああ',
    //         'content' => 'ああああああああああ'
    //       ],
    //       [
    //         'task_name' => 'あああ',
    //         'content' => 'ああああああああああ'
    //       ],
    //     ]
    //   ],

    //   'User2' => [
    //     'id' => 2,
    //     'name' => 'ai',
    //     'tasks' =>[
    //       [
    //         'task_name' => 'あああ',
    //         'content' => 'ああああああああああ'
    //       ],
    //       [
    //         'task_name' => 'あああ',
    //         'content' => 'ああああああああああ'
    //       ],
    //       [
    //         'task_name' => 'あああ',
    //         'content' => 'ああああああああああ'
    //       ],
    //     ]
    //   ],
    //   'User3' => [
    //     'id' => 3,
    //     'name' => 'ai',
    //     'tasks' =>[
    //       [
    //         'task_name' => 'あああ',
    //         'content' => 'ああああああああああ'
    //       ],
    //       [
    //         'task_name' => 'あああ',
    //         'content' => 'ああああああああああ'
    //       ],
    //       [
    //         'task_name' => 'あああ',
    //         'content' => 'ああああああああああ'
    //       ],
    //     ]
    //   ],
    // ];

    // return view('dashboard');
    return view('dashboard')->with(['users' => $viewData]);
  }



public function index()
  {
    //全ユーザーと各ユーザーに紐づくタスクをリレーションで取得
    $users = User::with(['tasks' => function ($query) {
      $query->whereNotNull('done_at');
  }])->get();

    //配列でユーザごとの情報取得
    foreach($users as $user){
      // dd($user);

      //連想配列でtaskの中身を取る処理
      foreach($user->tasks as $task){
        //$taskListに配列入れる
        $taskList [] = [
          'id' => $task->id,
          'task_name' => $task->task_name,
          'content' => $task->content
        ];
      }

      // dd($taskList);

      $viewData[$user->name] = [
        'id' => $user->id,
        'name' =>$user->name,

        'tasks' => $taskList

      ];

      $taskList = null;

    }

    // dd($viewData);
  //   return true;
  return view('dashboard')->with(['users' => $viewData]);
  }
}

