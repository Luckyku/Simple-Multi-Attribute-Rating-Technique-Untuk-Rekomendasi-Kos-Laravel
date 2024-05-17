<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Alternatif extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function kos(): HasOne{
        return $this->hasOne(Kos::class, 'id', 'kos_id');
    }
}
