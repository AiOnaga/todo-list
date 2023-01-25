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
        return $this->belongsTo(SlamDunkHighSchool::class);
    }
}
