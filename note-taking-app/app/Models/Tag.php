<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description'
    ];

    // Has many notes and belongs to user
    
    public function notes() : HasMany{
        return $this->hasMany(Note::class);
    }

    public function user() : BelongsTo{
        return $this->belongsTo(User::class);
    }

}
