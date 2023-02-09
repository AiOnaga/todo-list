<?php
namespace App\Http\Middleware;

use Closure;

class SampleMiddleware
{
  public function handle($request, Closure $next)
  { 
    //　何か書く
    // http://localhost/tasks/10/edit　←にアクセスする場合
    // $taskId = 10　が自分（ログインユーザー）のタスクではない場合、
    // http://localhost/all_user/tasks　←のルーティングにリダイレクトさせる


    // dd($request);
    if ($request->input('task_name')) {
      $request->sample_task_name = '【タスク名】' . $request->input('task_name');
    }

    // dd($request);
    return $next($request);
  }
}