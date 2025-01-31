<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class Tas extends Model
{

    use HasFactory;
    protected $fillable = ['nama', 'panjang', 'lebar', 'tinggi', 'Bungkus_kopi' ,'aksesoris','jumlah_dibuat'];

    public function gudang()
{
    return $this->hasOne(Gudang::class);
}

}

