<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TestImageController;
use App\Http\Controllers\TopController;
use App\Http\Controllers\MypageController;
use App\Http\Controllers\TaskController;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard',[DashboardController::class,'index'])
->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    //profile表示
    Route::get('/profile',[ProfileController::class, 'index'])->name('profile.index');
    //profile登録
    Route::post('/profile', [ProfileController::class, 'store'])->name('profile.store');
    //profile編集画面
    Route::get('/profile/{userId}/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    //profile更新処理
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //以下plofile画像の変更処理ルーディング
    Route::patch('/profile/image', [ProfileController::class, 'updateImage'])->name('profile.image.update');


    //TODO 以下commentのルーティング処理

    // get '/'
    // Route::get('/top', [TopController::class, 'index'])->name('top');

    // get '/mypage'
    // Route::get('/mypage', [MypageController::class, 'index'])->name('mypage');

    // タスク一覧（ログイン後のデフォ画面）
    Route::get('/tasks',[TaskController::class, 'index'])->name('tasks.index');

    // get '/task/:id'
    //ログインしているユーザーのタスク一覧
    Route::get('/tasks/{taskId}',[TaskController::class, 'show'])->name('tasks.show');

    // post '/task/:id'
    //タスク新規作成処理
    Route::post('/tasks', [TaskController::class, 'store'])->name('tasks.store');

    // get '/task/:id/edit'
    //編集画面表示
    Route::get('/tasks/{taskId}/edit', [TaskController::class, 'edit'])->middleware('test')->name('tasks.edit');

    // patch '/task/:id/edit'
    Route::put('/tasks/{taskId}', [TaskController::class, 'update'])->name('tasks.update');

    //Delete
    Route::delete('tasks/{taskId}',[TaskController::class, 'destroy'])->name('tasks.destroy');

    // get '/task/:id/done'
    Route::get('/tasks/{taskId}/done', [TaskController::class, 'done'])->name('tasks.show.done');

    // patch '/task/:id/done'
    Route::put('tasks/{taskId}/done',[TaskController::class,'updateDone'])->name('tasks.update.done');

    //以下※※sub_taskのルーディング
    //ログインしているユーザーの親タスク単位のタスク一覧
    // Route::get('/tasks/{taskId}',[TaskController::class, 'show'])->name('sub_tasks.show');

    //子タスクの新規作成処理
    Route::post('/tasks/{taskId}', [TaskController::class, 'subStore'])->name('sub_tasks.store');

    //子タスクの編集画面表示
    Route::get('/tasks/{taskId}/{subTaskId}/edit', [TaskController::class, 'edit'])->name('sub_tasks.edit');

    //子タスクの更新
    Route::put('/tasks/{taskId}/{subTaskId}', [TaskController::class, 'update'])->name('sub_tasks.update');

    //子タスクの削除
    Route::delete('tasks/{taskId}/{subTaskId}',[TaskController::class, 'destroy'])->name('sub_tasks.destroy');
    
    // 全ユーザーのタスク一覧表示
    Route::get('/all_user/tasks', [TaskController::class, 'allTasks'])->name('all.tasks.index');

    // 各ユーザーのタスク一覧表示
    Route::get('users/{userId}/tasks/{taskId}',[TaskController::class, 'userTask'])->name('user.tasks.show');
});

Route::get('/test/image', [TestImageController::class, 'index']);
Route::post('/test/upload', [TestImageController::class, 'upload']);

//スラムダンク練習用ルーディング
Route::get('/slam_dunk', [\App\Http\Controllers\SlamDunkController::class, 'index']);
Route::get('/slam_dunk/{slam_dunk_high_school_id}',[\App\Http\Controllers\SlamDunkController::class, 'show'])->name('slam_dunk.show');

require __DIR__.'/auth.php';
