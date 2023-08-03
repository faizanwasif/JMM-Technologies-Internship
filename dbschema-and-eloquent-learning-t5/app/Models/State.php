<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
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
    public function country(): BelongsTo{
        return $this->belongsTo(Country::class);
    } 
}
