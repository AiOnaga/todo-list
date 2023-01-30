<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TopController;
use App\Http\Controllers\MypageController;
use App\Http\Controllers\TaskController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

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
    Route::get('/tasks/{taskId}/edit', [TaskController::class, 'edit'])->name('tasks.edit');

    // patch '/task/:id/edit'
    Route::put('/tasks/{taskId}', [TaskController::class, 'update'])->name('tasks.update');

    //Delete
    Route::delete('tasks/{taskId}',[TaskController::class, 'destroy'])->name('tasks.destroy');

    // get '/task/:id/done'
    Route::get('/tasks/{taskId}/done', [TaskController::class, 'done'])->name('tasks.show.done');

    // patch '/task/:id/done'
    Route::put('tasks/{taskId}/done',[TaskController::class,'updateDone'])->name('tasks.update.done');
});

Route::get('/slam_dunk', [\App\Http\Controllers\SlamDunkController::class, 'index']);


require __DIR__.'/auth.php';
