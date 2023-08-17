<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    use HasFactory;

    protected $fillable=[
        'contact_id',
        'note_id',
    ];

    public function contact() : BelongsTo
    {
        return $this->belongsTo(Contact::class, 'content_id');
    }

    public function note() : BelongsTo
    {
        return $this->belongsTo(Note::class, 'note_id');
    }
}
