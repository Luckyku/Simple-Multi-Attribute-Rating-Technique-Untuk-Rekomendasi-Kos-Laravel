<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Kos extends Model
{
    use HasFactory, Sluggable;

    protected $guarded= ['id'];

    public function komentar(): HasMany
    {
        return $this->HasMany(Komentar::class);
    }

    public function luas(): BelongsTo{
        return $this->belongsTo(LuasKamar::class);
    }
    public function fasilitass(): BelongsTo{
        return $this->belongsTo(Fasilitas::class, 'fasilitas');
    }

    public function tipe(): BelongsTo
    {
        return $this->belongsTo(Tipe::class, 'tipe_id');
    }

    
    public function alternatif():HasOne{
        return $this->hasOne(Alternatif::class, 'kos_id');
    }
    public function nilaiUtility():HasOne{
        return $this->hasOne(NilaiUtility::class, 'kos_id');
    }
    public function endValues():HasOne{
        return $this->hasOne(endValue::class, 'kos_id');
    }
    public function getRouteKeyName()
    {
        return 'slug';
    }
    
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'nama'
            ]
        ];
    }

}
