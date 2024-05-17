<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Fasilitas extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function kos(): HasMany
    {
        return $this->hasMany(Kos::class, 'fasilitas');
    }
}
