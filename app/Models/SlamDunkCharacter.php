<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SlamDunkCharacter extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function highSchool()
    {
        return $this->belongsTo(SlamDunkHighSchool::class, 'slam_dunk_high_school_id');
    }

    public function position()
    {
        return $this->belongsTo(SlamDunkPosition::class, 'slam_dunk_position_id');
    }
}
