<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    // fillable定義

    // Userモデルとのリレーション定義
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}