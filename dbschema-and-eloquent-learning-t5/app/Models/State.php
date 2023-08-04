<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    use HasFactory;

    protected $fillable =[
        'name',
        'country_id'
    ];

    protected $touches = ['country'];

    // defining relations
    // Define the relationship with cities
    public function cities(): HasMany
    {
        return $this->hasMany(City::class);
    }
    
    public function country(): BelongsTo{
        return $this->belongsTo(Country::class);
    } 

    
}
