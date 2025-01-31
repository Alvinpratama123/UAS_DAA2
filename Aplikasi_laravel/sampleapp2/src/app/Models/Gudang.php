<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gudang extends Model
{
    use HasFactory;
    protected $fillable = ['tas_id', 'jumlah','Bungkus_kopi'];

    public function tas()
    {
        return $this->belongsTo(Tas::class);
    }
}
