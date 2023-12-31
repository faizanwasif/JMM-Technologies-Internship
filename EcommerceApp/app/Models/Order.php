<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'total_amount',
        'order_date'
    ];

    public function user() : BelongsTo{
        return $this->belongsTo(User::class);
    }

    public function orderItem() : HasMany{
        return $this->hasMany(OrderItem::class);
    }
}
