<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    public function category()
    {
        return $this->belongsTo(Category::class, 'cat_id');
    }
    protected $fillable = [
        'title',
        'content',
        'pubdate',
        'cat_id'
    ];
}