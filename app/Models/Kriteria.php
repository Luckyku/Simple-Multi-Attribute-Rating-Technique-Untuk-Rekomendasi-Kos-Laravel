<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
// use app\Models\Nkriteria;

class Kriteria extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function getRouteKeyName()
    {
        return 'nama';
    }

    public function nkriteria(): HasOne{
        return $this->hasOne(Nkriteria::class, 'kriteria_id');
    }
    

}
