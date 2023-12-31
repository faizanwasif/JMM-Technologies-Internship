<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $fillable=[
        'user_id',
        'product_id'
    ];

    // public function product() : BelongsTo{
    //     return $this->belongsTo(Product::class);
    // }

    public function products() : BelongsToMany{
        return $this->belongsToMany(Cart::class);
    }

    public function user() : BelongsTo{
        return $this->belongsTo(User::class);
    }

}
