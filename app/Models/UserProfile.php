<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    use HasFactory;

    // fillable定義
    protected $fillable = [
        'user_id',
        'image_path',
    ];

    // Userモデルとのリレーション定義
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
