<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class albums extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user(): BelongsTo{
        return $this->belongsTo(User::class,'id');
    }

    public function foto():HasMany{
        return $this->hasMany(Foto::class);
    }
    public function video():HasMany{
        return $this->hasMany(Video ::class);
    }



}


