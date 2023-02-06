<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubTask extends Model
{
    use HasFactory;

    // fillable定義
    protected $fillable = [
        'user_id',
        'sub_task_name',
        'task_name',
        'content',
        'scheduled_start_date',
        'scheduled_end_date',
        'done_at'
    ];

    // Userモデルとのリレーション定義

    public function task()
    {
        return $this->hasManyThrough(User::class, Task::class);
    }
    
}

