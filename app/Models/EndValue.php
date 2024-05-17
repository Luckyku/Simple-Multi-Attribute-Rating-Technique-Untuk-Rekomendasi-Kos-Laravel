<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class EndValue extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function kos(): HasOne{
        return $this->hasOne(Kos::class, 'id', 'kos_id');
    }
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
