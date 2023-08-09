<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'iamge',
        'price',
        'category_id'
    ];

    // protected $touches = ['product'];

    public function category(): BelongsTo{
        return $this->belongsTo(Category::class);
    }

    public function productView() : HasMany{
        return $this->hasMany(ProductView::class);
    }

    public function orderItem() : HasMany{
        return $this->hasMany(OrderItem::class);
    }

    public function carts() : BelongsToMany{
        return $this->belongsToMany(Cart::class);
    }

    
}
