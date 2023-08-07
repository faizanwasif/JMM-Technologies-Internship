<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductView extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'product_id',
        'viewed_at'
    ];

    public function user() : BelongsTo{
        return $this->belongsTo(User::class);
    }

    public function product() : BelongsTo{
        return $this->belongsTo(Product::class);
    }
}
