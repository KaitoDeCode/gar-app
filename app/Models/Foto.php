<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Foto extends Model
{
    use HasFactory;

    protected $guarded =[
    ];

    public function albums(): BelongsTo{
        return $this->belongsTo(albums::class,'id');
    }
    public function kommentar_foto(): HasMany{
        return $this->hasMany(Kommentar_foto::class,'id');
    }
    public function report(): HasMany{
        return $this->hasMany(Report::class);
    }
    public function like(): HasMany{
        return $this->hasMany(Like::class);
    }
    public function favorite(): HasMany{
        return $this->hasMany(Favorite::class);
    }

    public function isFavorite()
    {
        return $this->favorite()->where('user_id', auth()->id())->exists();
    }
}
