<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use function PHPUnit\Framework\returnSelf;

class TaskController extends Controller
{
    public function index()
    {
        // $tasks = Task::all();

        // 現在認証しているユーザーを取得
        $user = Auth::user();
        // dd($user->tasks);
        // モデル->リレーション名
        $tasks = User::find($user->id)->tasks;
        $tasks = $user->tasks;

        // $tasks = Auth::user()->tasks;

        // 現在認証しているユーザーのIDのみを取得
        // $id = Auth::id();
        // dd($id);
        // $tasks = User::find($id)->tasks;
        
        // 参考　$comments = Post::find(1)->comments;
        // commentsテーブルが持つpost_id=1のデータを取得する
        // $tasks = User::find(2)->tasks;

        // return 'tasks.index';
        return view('task.index')
            ->with('tasks', $tasks);
    }

    public function show(int $taskId )
    {
        $tasks = Task::find($taskId);
        // dd($tasks);

        return view('task.index')
            ->with('tasks', $tasks);
    }

    public function store(Request $request)
    {
        // dd(Carbon::parse($request->input('scheduled_start_date')));
        // dd($request->all());

        // // インスタンス化
        // $task = new Task();

        // // プロパティの設定（カラムに　値」を詰める）
        // $task->user_id = $request->user()->id;
        // $task->task_name = $request->input('task_name');
        // $task->content = $request->input('content');
        // $task->scheduled_start_date = Carbon::parse($request->input('scheduled_start_date'));
        // $task->scheduled_end_date = Carbon::parse($request->input('scheduled_end_date'));

        // // 保存処理実行
        // $result = $task->save();

        $result =Task::create([
            'user_id' => $request->user()->id,
            'task_name' => $request->input('task_name'),
            'content' => $request->input('content'),
            'scheduled_start_date' => Carbon::parse($request->input('scheduled_start_date')),
            'scheduled_end_date' => Carbon::parse($request->input('scheduled_end_date')),
        ]);

        return redirect()->route('tasks.show', ['taskId' => $result->id]);
    }

    public function edit(int $taskId)
    {
        return 'tasks.edit';
    }

    public function update(int $taskId)
    {
        return redirect()->route('tasks.edit', ['taskId' => 1]);
    }

    public function done(int $taskId)
    {
        return 'tasks.show.done';
    }

    public function updateDone(int $taskId)
    {
        return redirect()->route('mypage');
    }

}
