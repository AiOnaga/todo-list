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
        // $tasks = User::find($user->id)->tasks;
        $tasks = $user->tasks;
        // dd($tasks);

        // $tasks = Auth::user()->tasks;

        // 現在認証しているユーザーのIDのみを取得
        // $id = Auth::id();
        // dd($id);
        // $tasks = User::find($id)->tasks;
        
        // 参考　$comments = Post::find(1)->comments;
        // commentsテーブルが持つpost_id=1のデータを取得する
        // $tasks = User::find(2)->tasks;

        // TODO: 完了済みタスク一覧取得　（done_atがNULLでない）
        // TODO: 未完了タスク一覧取得　（done_atがNULLである）

        // return 'tasks.index';
        return view('task.index')
            ->with('tasks', $tasks);
    }

    public function show(int $taskId )
    {
        $user = Auth::user();

        $task = $user->tasks()
            ->where('id', $taskId)
            ->first();

        // $user->id を使う
        // $task = Task::where('id', $taskId)
        //     ->where('user_id', $user->id)
        //     // ->toSql();
        //     ->first();

        // dd($task);

        return view('task.show')
            ->with('task', $task);
    }

    public function store(Request $request)
    {
        // dd(Carbon::parse($request->input('scheduled_start_date')));
        // dd($request->all());


        // パターン1 : save()を使う場合
        // save() はtrue or falseが返ってくる
        // → リダイレクト先に必要なtaskIdが取得できない
        // $task = new Task(); // インスタンス化
        // // プロパティの設定（カラムに　値」を詰める）
        // $task->user_id = $request->user()->id;
        // $task->task_name = $request->input('task_name');
        // $task->content = $request->input('content');
        // $task->scheduled_start_date = Carbon::parse($request->input('scheduled_start_date'));
        // $task->scheduled_end_date = Carbon::parse($request->input('scheduled_end_date'));
        // $result = $task->save(); // 保存処理実行
        // dd($result);


        // パターン2 : create()を使う場合
        // create() は作成したモデル(Task)が返ってくる
        // → リダイレクト先に必要なtaskIdが取得できる($result->id)
        $result = Task::create([
            'user_id' => $request->user()->id,
            'task_name' => $request->input('task_name'),
            'content' => $request->input('content'),
            'scheduled_start_date' => Carbon::parse($request->input('scheduled_start_date')),
            'scheduled_end_date' => Carbon::parse($request->input('scheduled_end_date')),
        ]);
        // dd($result);

        return redirect()->route('tasks.show', ['taskId' => $result->id]);
    }

    public function edit(int $taskId)
    {
        $user = Auth::user();
        $task = $user->tasks()
        ->where('id', $taskId)
        ->first();

        // return 'tasks.edit';
        return view('task.edit')
                ->with('task', $task);
    }

    public function update(int $taskId, Request $request)
    {
        // dd("更新");

        // 1. ログインユーザー取得
        $user = Auth::user();

        // 2. $taskIdで対象のtaskを取得
        $task = $user->tasks()
        ->where('id', $taskId)
        ->first();

        // 118行目で取得したインスタンス(モデル)をsave()で更新するパターン *****************************
        // 4. 取得したtaskの各プロパティ(属性)にリクエストを埋める
        // $task->task_name = $request->input('task_name');
        // $task->content = $request->input('content');
        // $task->scheduled_start_date = Carbon::parse($request->input('scheduled_start_date'));
        // $task->scheduled_end_date = Carbon::parse($request->input('scheduled_end_date'));
        // 5. taskを更新
        // $task->save();
        // *****************************


        // 118行目で取得したインスタンス(モデル)をupdate()で更新するパターン *****************************
        $task->update([
            // 'user_id' => $user->id,
            'task_name' => $request->input('task_name'),
            'content' => $request->input('content'),
            'scheduled_start_date' => Carbon::parse($request->input('scheduled_start_date')),
            'scheduled_end_date' => Carbon::parse($request->input('scheduled_end_date')),
        ]);
        // *****************************


        // whereとupdateのメソッドチェーンで更新するパターン *****************************
        // $task = Task::where('id', $taskId)->update([
        //     // 'user_id' => $user->id,
        //     'task_name' => $request->input('task_name'),
        //     'content' => $request->input('content'),
        //     'scheduled_start_date' => Carbon::parse($request->input('scheduled_start_date')),
        //     'scheduled_end_date' => Carbon::parse($request->input('scheduled_end_date')),
        // ]);
        // *****************************


        // dd($task);

        return redirect()->route('tasks.show', ['taskId' => $taskId]);
    }

    public function destroy(int $taskId)
    {
        $user = Auth::user();
        $task = $user->tasks()
            ->where('id',$taskId)
            ->first();
        $task->delete();
        
        return redirect()->route('tasks.index');
    }

    public function done(int $taskId)
    {
        $user = Auth::user();
        $task = $user->tasks()
        ->where('id', $taskId)
        ->where('done_at', null)
        ->first();  

        return view('task.done')
        ->with('task', $task);

        // return 'tasks.show.done';
    }

    public function updateDone(int $taskId, Request $request)
    {
        $user = Auth::user();
        $task = $user->tasks()
        ->where('id', $taskId)
        ->where('done_at', null)
        ->first();  

        $task->update([
            'done_at'=>Carbon::parse($request->input('done_at'))
        ]);

        return redirect()->route('tasks.index');
    }

}
