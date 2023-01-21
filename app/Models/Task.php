<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    // fillable定義
    protected $fillable = [
        'user_id',
        'task_name',
        'content',
        'scheduled_start_date',
        'scheduled_end_date',
        'done_at'
    ];

    // Userモデルとのリレーション定義
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
