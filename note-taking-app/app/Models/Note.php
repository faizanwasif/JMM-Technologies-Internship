<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'tag_id'
    ];

    // belongs to both user and tags
    public function user() : BelongsTo{
        return $this->belongsTo(User::class);
    }

    public function tag() : BelongsTo{
        return $this->belongsTo(User::class);
    }
}
