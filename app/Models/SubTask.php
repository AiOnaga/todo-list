<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubTask extends Model
{
    use HasFactory;

    // fillable定義
    protected $fillable = [
        'task_id',
        'sub_task_name',
        'task_name',
        'content',
        'scheduled_start_date',
        'scheduled_end_date',
        'done_at'
    ];

    // Taskモデルとのリレーション定義
    public function task()
    {
        return $this->belongsTo(Task::class);
    }

    // $subTask = SubTask::find(1);
    // $subTask->task->user

    // これは取れる
    // $subTask->task()->where('task_name', 'キュウリ買う')->first()
    // これは取れない
    // // $subTask->task()->where('task_name', 'トマト買う')->first()
}

