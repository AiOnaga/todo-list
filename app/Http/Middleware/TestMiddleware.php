<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Task;

class TestMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {

        $taskId = $request->route()->parameter('taskId');
        // dd($request->route());

        // http://localhost/tasks/10/edit　←にアクセスする場合
        // $taskId = 10　が自分（ログインユーザー）のタスクではない場合、
        // http://localhost/all_user/tasks　←のルーティングにリダイレクトさせる
        // dd($taskId);

        // 自分のユーザーIDを取得
        $user = $request->user();
        // dd($user);
        // Taskのidと$taskIdが=になることを条件にそのタスク(Task)を取得する
        // Hoge::find($hogeId) → SELECT * FROM 'hoge' WHERE 'id' = $hogeId
        $task = Task::find($taskId);
        // ↑で取得したTaskのuser_idと$user->idが一致するかどうかをif文でチェック!
        if( $user->id !== $task->user_id ){
            return redirect()->route('all.tasks.index');
        }

        return $next($request);
    }
}
