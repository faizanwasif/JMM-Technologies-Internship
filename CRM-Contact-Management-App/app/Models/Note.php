<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasFactory;

    protected $fillable=[
        'title',
        'content',
        'contact_id'
    ];

    public function contact()
    {
        return $this->belongsTo(Contact::class);
    }
}
